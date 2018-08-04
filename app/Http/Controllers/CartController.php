<?php

namespace App\Http\Controllers;

use App\Mail\Mailtrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Phone;
use Alert;
use App\Order;
use App\WishList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        $cart = Cart::content();
        return view('cart.index', ['data' => $cart, 'wishes' => $wishes])->withTitle('Shopping Cart');
    }
    public function addItem($id){
        $phone = Phone::find($id);
        Cart::add(['id' => $phone->phone_id , 'name' => $phone->name, 'qty' => 1, 'price' => $phone->price, 'options' =>['img' => $phone->image1]]);
        Alert::success('CONTINUE SHOPPING', 'Item added to cart!');
        return back();
    }
    public function removeItem($id){
        Cart::remove($id);
        Alert::error('CONTINUE SHOPPING', 'Item removed!');
        return back();
    }
    public function update(Request $req, $id){
        $qty = $req->qty;
        $id = $req->id;
        $rowId = $req->rowId;
        Cart::update($rowId, $qty);
//        $data = Cart::content();
//        return back()->with($data);
//        Alert::success('continue shopping', 'Item added to cart!');
//        return view('cart.upCart', ['data' => $data])->withTitle('Shopping Cart');
    }

    public function checkout(){
        $cart = Cart::content();
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('cart.checkout', ['data' => $cart, 'wishes' => $wishes])->withTitle('Shopping Cart');
    }

    public function order(Request $request){
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->number = $request->input('number');
        $order->total = Cart::total();
        $order->quantity = Cart::count();
        $order->save();
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.order', [], function($message)
        {
            $email = Input::get('email');
            $message
                ->from('mobile4u@gmail.com')
                ->to($email, '')
                ->subject('Order Confirmation');
        });
//        Mail::to($request->input('email'))->send(new Mailtrap());

        Cart::destroy();
        Alert::success('CHECK YOUR MAIL', 'Your order is saved!');
        return redirect('cart');
    }

    public function addToWishlist(Request $request){
        $wish = new WishList;
        $wish->user_id = auth()->user()->id;
        $wish->phone_id = $request->phone_id;
        $wish->save();
        Alert::success('ADD MORE', 'Item saved to WISHLIST!');
        return redirect()->back();
    }

    public function wishlist(){
        $wishes = DB::table('wishlist')->leftjoin('phones', function ($join) {
            $join->on('wishlist.phone_id', '=', 'phones.phone_id');

        })->where('user_id', '=', auth()->user()->id)->get();
        return view('cart.wishlist', ['wishes' => $wishes])->withTitle('WishList');
    }

    public function removeWish($id){
        $wishid = WishList::where('id', '=', $id)->first();
        $wishid->delete();
        Alert::success('ADD MORE', 'Removed from WISHLIST!');
        return redirect()->back();
    }

//    public function moveToCart($id){
//        $wish = WishList::where('id', '=', $id)->first();
//
//        Cart::add(['id' => $wish->phone_id , 'name' => $wish->name, 'qty' => 1, 'price' => $wish->price, 'options' =>['img' => $wish->image1]]);
//        $wish->delete();
//        Alert::success('CONTINUE SHOPPING', 'Item added to cart!');
//        return back();
//    }
}

