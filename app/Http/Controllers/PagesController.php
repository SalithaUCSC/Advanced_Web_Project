<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Phone;
use App\User;

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

    public function brand(Request $request)
    {
        $term = $request->term;
        $items = Phone::where('brand', '=', $term)->get();
        if(count($items) == 0){
            $searchRes[] = "No brands";
        }
        else {
            foreach($items as $val){
                $searchRes[] = $val->name;
            } 
        }
        return $searchRes; 
    }
    // public function search(Request $request)
    // {
    //     if($request->ajax()){
    //         $find = Phone::where('name', 'LIKE','%'.$request->name.'%')->get();
    //         return resopnse()->json();
    //     }
    // }
    // public function update()
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'body' => 'required'
    //     ]);
    //     $post = User::find($id);   
    //     $post->name = $request->input('name');
    //     $post->email = $request->input('emailbody');
    //     $post->save();
    //     return redirect('edit_user')->with('success', 'Post updated');
    //     // return view('users.edit');
    // }
}










