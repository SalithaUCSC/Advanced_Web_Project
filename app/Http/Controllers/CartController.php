<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Phone;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::content();
        return view('cart.index', ['data' => $cart]);
    }
    public function addItem($id){
        $phone = Phone::find($id);
        Cart::add(['id' => $phone->phone_id , 'name' => $phone->name, 'qty' => 1, 'price' => $phone->price, 'options' =>['img' => $phone->image1]]);
        return back();
    }
    public function removeItem($id){
        Cart::remove($id);
        return back();
    }
    public function update(Request $req){
        $qty = $req->newQty;
        return $rowId = $req->rowID;

        Cart::update($rowId, $qty);
        echo "updated";
    }
}

