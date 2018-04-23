<?php

namespace App\Http\Controllers;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Phone;
use App\Review;
use App\Post;
use App\User;
use App\Brand;
use Illuminate\Support\Facades\Session;
use App\Like;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::orderBy('phone_id','desc')->paginate(8);
        $brands = Brand::orderBy('brand_id','desc')->paginate(10);

        $wishes = '';
        $wishesHave = '';
        if (Auth::check()){
            $wishes = DB::table('wishlist')->leftjoin('phones', function ($join) {
                $join->on('wishlist.phone_id', '=', 'phones.phone_id');

            })->where('user_id', '=', auth()->user()->id)->get();

            $wishesHave = DB::table('wishlist')->leftjoin('phones', function ($join) {
                $join->on('wishlist.phone_id', '=', 'phones.phone_id');

            })->where('user_id', '=', auth()->user()->id)->get();

        }
        return view('phones.index',['brands'=>$brands, 'phones'=>$phones, 'wishes' => $wishes, 'wishesHave' => $wishesHave
        ])->withTitle('Mobile Phones');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phone::find($id);
        $likePhone = Phone::find($id);
        $likeCtr = Like::where(['phone_id' => $likePhone->phone_id])->get();
        $reviews = Review::where('phone_id', '=', $id)->orderBy('id', 'desc')->paginate(3);
        $relphones = Phone::orderByRaw("RAND()")->take(4)->get();
        $wishes = '';
        if (Auth::check()){
            $wishes = WishList::where('phone_id', '=', $id)->where('user_id', '=', auth()->user()->id)->get();
        }
        $cart = Cart::content();
        return view('phones.show',['phone' => $phone, 'reviews' => $reviews, 'likeCtr' => $likeCtr, 'relphones' => $relphones, 'cart' => $cart, 'wishes' => $wishes])->withTitle('Phone Details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
