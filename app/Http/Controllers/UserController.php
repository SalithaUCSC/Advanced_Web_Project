<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Alert;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\WishList;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {

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
        $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        $user = User::where('id', '=', $id)->get()->first();
        $orders = Order::where('user_id', '=', $id)->get();
//        if(!$user){
//            Alert::error('Unauthorized Access!')->autoclose(3000);
//            return redirect('/');
//        }
        return view('users.profile', ['user' => $user, 'orders' => $orders, 'wishes' => $wishes])->withTitle('User Profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edituser = User::where('name', '=', $id)->get()->first();
        $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        return view('users.edit', ['edituser' => $edituser, 'wishes' => $wishes])->withTitle('Edit Profile');
//        return view('users.edit')->withTitle('Edit User');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        if($request->hasFile('avatar')){
//            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
//            // get file name
//            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//            // get extension
//            $extension = $request->file('avatar')->getClientOriginalExtension();
//
//            $fileNameToStore = $filename.'_'.time().'.'.$extension;
//
//            Image::make($request->file('avatar'))->resize(200,200);
            // upload
//            $path = $request->file('avatar')->storeAs('public/user_images', $fileNameToStore);

            $avatar = $request->file('avatar');
            $fileNameToStore = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->insert(public_path('/images/avatars/user.png'))->save(public_path('/images/avatars/'.$fileNameToStore));
            $path = $request->file('avatar')->storeAs('public/user_images', $fileNameToStore);
            $user = User::find($id);
            $user->avatar = $fileNameToStore;
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->hasFile('avatar')){
            $user->avatar = $fileNameToStore;
        }

        $user->save();
        Alert::success('Profile updated!');
        return redirect()->route('profile', Auth::user()->id);
    }

//    public function updatePwd(Request $request, $id){
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required'
//        ]);
//
//        $user = User::find($id);
//        $user->password =  Hash::make($request->input('password'));
//        $user->save();
//        Alert::success('Password changed!');
//        return redirect()->route('profile', Auth::user()->id);
//    }

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
