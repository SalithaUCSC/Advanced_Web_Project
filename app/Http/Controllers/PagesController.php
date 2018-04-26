<?php

namespace App\Http\Controllers;
use App\Like;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Illuminate\Database\Eloquent\Collection;
use App\Phone;
use App\User;
use App\Brand;
use PDF;
use Excel;
use Alert;
use App\WishList;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Datatables;

class PagesController extends Controller
{
    public function index()
    {
        $wishes = '';
        if (Auth::check()){
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('index', ['wishes' => $wishes])->withTitle('MOBILE4U');
    }

    public function getPhones()
    {
        $getPhones = Phone::select('name', 'ram', 'internal', 'cam_primary', 'cam_secondary', 'price');
        return datatables()->of($getPhones)->toJson();
    }

    public function search(Request $request)
    {
        $search=  $request->term;
        $phones = Phone::where('name','LIKE',"%{$search}%")
            ->orderBy('phone_id','DESC')->limit(5)->get();

        if(!$phones->isEmpty())
        {
            foreach($phones as $phone)
            {

                $new_row['name']= $phone->name;
                $new_row['image']= url('storage/phones/'.$phone->image1);
                $new_row['url']= url('phones/'.$phone->phone_id);

                $row_set[] = $new_row; //build an array
            }
        }

        echo json_encode($row_set);
    }


    public function brand($id)
    {
        $brand = Brand::where('brand', '=', $id)->get()->first();
        $phone = Phone::where('brand', '=', $id)->get();
        $wishes = '';
        if (Auth::check()){
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }

        return view('phones.brands', ['phone' => $phone, 'brand' => $brand, 'wishes' => $wishes])->withTitle('Branded phones');
    }

    public function product_search(Request $request){
        $name = $request->input('search_data');
        $records = Phone::where('name', '=', $name)->get();
        $res = [];
        foreach ($records as $row){
            $res .= $row->name;
        }
        echo $res;
    }

    function compare($id)
    {
        $phone = Phone::find($id);
        $phones = Phone::orderBy('phone_id', 'desc')->paginate(10);
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('phones.compare', ['phone' => $phone, 'phones' => $phones, 'wishes' => $wishes])->withTitle('Compare Phones');
    }

    public function likePhone($id){
        $loggedin_user = Auth::user()->id;
        $like_user = Like::where(['user_id' => $loggedin_user, 'phone_id' => $id])->first();
        if (empty($like_user->user_id)){
            $user_id = Auth::user()->id;
            $email = Auth::user()->email;
            $phone_id = $id;

            $like = new Like();
            $like->user_id = $user_id;
            $like->email = $email;
            $like->phone_id = $phone_id;
            $like->save();
            $phone = Phone::find($id);
            $reviews = Review::where('phone_id', '=', $id)->orderBy('id', 'desc')->paginate(3);
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
            Alert::success('You became a fan!', 'Thank You!');
            return Redirect::route('show_phone', ['phone' => $phone, 'reviews' => $reviews, 'wishes' => $wishes])->withTitle('Phone Details');
        }
        else {
            $phone = Phone::find($id);
            $reviews = Review::where('phone_id', '=', $id)->orderBy('id', 'desc')->paginate(3);
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
            Alert::warning('ALLOWED ONCE ONLY..', 'You have already liked!')->autoclose(3000);
            return Redirect::route('show_phone', ['phone' => $phone, 'reviews' => $reviews, 'wishes' => $wishes])->withTitle('Phone Details');
        }
    }

    public function getPdf(){
        $phones = Phone::orderBy('price','desc')->get();
        $view = \View::make('phones.pricelist', ['phones'=>$phones]);
        $html_content = $view->render();
        PDF::SetTitle("Price List of mobiles phones");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        PDF::Output(uniqid().'_PriceList.pdf', 'D');

    }

    public function getPrices(){
        $wishes = '';
        $phones = Phone::orderBy('price','desc')->paginate(10);
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        Alert::success('You have full the price list', 'Phone List is loading...');
        return view('phones.price_table',['phones'=>$phones, 'wishes' => $wishes])->withTitle('Mobile Phones');
        // $users = User::all();
    }

    public function phoneFilter(Request $request){
        $brand_id = $request->brand_id;
        $price = explode('-', $request->price);

        $start = $price[0];
        $end = $price[1];
        $output = '';
        if ($start==10000 && $end==20000){
            $data = Phone::where('brand_id', '=', $brand_id)->whereBetween('price', [10000,20000])->get();
            $output .= '<center><h5>'.'No phones from this brand between Rs: '.'<b id="boldPrice">'.'10000'.' - '.'20000'.'</b>'.' price range</h5></center>';
            echo $output;
        }
        else {
            if ($brand_id !="" && $price !=""){
                $data = Phone::where('brand_id', '=', $brand_id)->whereBetween('price', [$start,$end])->get();
            }
            else if($brand_id !=""){
                $data = Phone::where('brand_id', '=', $brand_id)->get();
            }
            else{
                $data = Phone::where('price', '>=', $start)->where('price', '<=', $end)->get();
            }

            if (count($data) == 0){
                $output .= '<center><h5>'.'No phones from this brand between Rs: '.'<b id="boldPrice">'.$start.' - '.$end.'</b>'.' price range</h5></center>';
                echo $output;
            }
            else {
                $output .= '<p><b style="color: red;">'.count($data).' phones found</b></p>';
                $output .= '<div class="row"><div class="col-lg-3"> ';
                foreach ($data as $p){
                    $output .= '
                    <div class="card" id="phone-card"><br>
                                    <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/storage/phones/'.$p->image1.'" alt="Card image cap"></div>
                                    <div class="card-body">
                                        <a id="phone-path" href="/phones/'.$p->phone_id.'"><h5 class="card-title text-center">'.$p->name.'</h5></a><br>
                                        <button  class="btn btn-dark btn-sm" style="font-size: 12px;">Rs. '.$p->price.'</button>

                                        <a href="cart/add/'.$p->phone_id.'" style="float: right;" id="add-cart" class="btn btn-primary btn-sm">Add</a>
                                        
                                       
                    ';
                    if (!Auth::check()){
                        $output .= '<a id="addWish" data-toggle="modal" data-target="#loginModal" class="btn btn-link" style="text-decoration: none;"><i class="fas fa-plus-circle"></i> add to wishlist</a>';
                    }
                    $output .= '</div></div>';
//                    $output .= '<a href="/phones/'.$p->phone_id.'" class="badge badge-primary searchPhone" style="width: 250px;height:50px;padding: 20px;">'.'<p>'.$p->name.'</p>'.'</a>';
                    $output .= '</div>';
                }
                $output .= '</div>';
                echo $output;
            }
        }



    }


    public function comparePhone(Request $request){
        $phone_id = $request->phone_id;
        $phone = Phone::where('phone_id','=', $phone_id)->get();
        $output = '';
        if ($phone) {
            foreach ($phone as $cp){
                $output .= '  <div class="card" style="height: 650px;">
                            <img src="/storage/phones/'.$cp->image1.'" style="margin: auto;height: 270px;width: 240px;padding-top: 20px;">
                            <div class="card-body">
                            <h4 class="text-center">'.$cp->name.'</h4>
                            <center><a href="/phones/'.$cp->phone_id.'" class="text-center" style="margin: auto;">See more details</a></center><br>
                                <ul class="list-group">
                                    <li class="list-group-item"><b>RAM</b> : '.$cp->ram.'</li>
                                    <li class="list-group-item"><b>Internal Memory</b> : '.$cp->internal.'</li>
                                    <li class="list-group-item"><b>Back Camera</b> : '.$cp->cam_primary.'</li>
                                    <li class="list-group-item"><b>Front Camera</b> : '.$cp->cam_secondary.'</li>
                                    <li class="list-group-item"><b>Display Size</b> : '.$cp->display_size.'</li>
                                </ul>
                            </div>
                        </div>
                       ';
            }
            echo $output;
        }

    }

    public function export_list($type)
    {
        $phones = Phone::get()->toArray();
        return Excel::create('phones', function($excel) use ($phones) {
            $excel->sheet('Phone Data', function($sheet) use ($phones) 
            {
                $sheet->fromArray($phones);
            });
        })->download($type);
    }

    public function notFound(){
//        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
//        }
//        $wishes = '';
        return view('errors.404', ['wishes' => $wishes])->withTitle('Page Not Found');
    }
}










