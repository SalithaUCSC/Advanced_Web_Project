<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WishList;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        return view('dashboard', ['posts' => $user->posts, 'wishes' => $wishes])->withTitle('Dashboard');;
    }
}
