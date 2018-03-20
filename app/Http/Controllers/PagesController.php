<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Illuminate\Database\Eloquent\Collection;
use App\Phone;
use App\User;
use App\Brand;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->withTitle('Phone Shop');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function edit_user()
    {
        return view('users.edit');
    }

    public function search(Request $request)
    {
        $term = $request->term;
        $items = Phone::where('name', 'LIKE','%'.$term.'%')->get();
        if(count($items) == 0){
            $searchRes[] = "No phones";
        }
        else {
            foreach($items as $val){
                $searchRes[] = $val->name;
            } 
        }
        return $searchRes;      
    }

    public function brand($id)
    {
        $phone = Phone::where('brand', '=', $id)->get();
        return view('phones.brands', ['phone' => $phone]);
    }

    public function product_search($name){
//        $term = $request->term;
        $name = Phone::where('name', '=', $name)->get();
        $res = '';
        foreach ($name as $row){
            $res .= $row->name;
        }
//        if(count($name) == 0){
//            $searchRes[] = "No phones";
//        }
//        else {
//            foreach($name as $val){
//                $searchRes[] = $val->name;
//            }
//        }
        echo $res;
    }
}










