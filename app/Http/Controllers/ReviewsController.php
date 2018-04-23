<?php

namespace App\Http\Controllers;

use App\Review;
use App\ReplyRev;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReviewsController extends Controller
{
    public function index($id){
        $phone = Phone::find($id);
        $phones = Phone::orderBy('phone_id', 'desc')->paginate(10);
        $reviews = Review::where('phone_id', '=', $id)->orderBy('id', 'desc')->paginate(10);
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('reviews.index', ['phone' => $phone, 'phones' => $phones, 'reviews' => $reviews, 'wishes'=> $wishes])->withTitle('Phone Reviews');
    }

    public function create($id){
        $phone = Phone::find($id);
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('reviews.create', ['phone' => $phone, 'wishes' => $wishes])->withTitle('Post a Review');;
    }

    public function addReview(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'review' => 'required'
        ]);
        $post = new Review;

        $post->user_id = auth()->user()->id;
        $post->phone_id = $request->input('phone_id');
        $post->username = auth()->user()->name;
        $post->review = $request->input('review');
        $post->save();
        $phone = Phone::find($request->input('phone_id'));
        Alert::success('wait for approval', 'You review submitted!');
        return redirect()->back();
//        return \Redirect::route('create_review', ['phone' => $phone])->with('success', 'Your review has been saved! Admin will make it display.');
//        return redirect('phones/reviews/{id}')->with('success', 'Post created');
    }

    public function postReview(Request $request){
        $rules = array(
            'username' => 'required',
            'review' => 'required'
        );

        $validator = Validator::make( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else {
            $post = new Review;

            $post->user_id = auth()->user()->id;
            $post->phone_id = $request->input('phone_id');
            $post->username = auth()->user()->name;
            $post->review = $request->input('review');
            $post->save();
//            return Response::json($post);
            Alert::success('wait for approval', 'You review submitted!');
            return redirect()->back();
        }

//        $phone = Phone::find($request->input('phone_id'));
//        Alert::success('wait for approval', 'You review submitted!');

//        return \Redirect::route('create_review', ['phone' => $phone])->with('success', 'Your review has been saved! Admin will make it display.');
//        return redirect('phones/reviews/{id}')->with('success', 'Post created');
    }

    public function replyReview(Request $request){
//        $this->validate($request, [
//            'username' => 'required',
//            'reply_review' => 'required'
//        ]);
        $reply = new ReplyRev;
        $reply->user_id = auth()->user()->id;
        $reply->review_id = $request->input('review_id');
        $reply->phone_id = $request->input('phone_id');
        $reply->username = $request->input('username');
        $reply->reply_review = $request->input('reply_review');
        $reply->save();
        Alert::success('wait for approval', 'Your reply submitted!')->autoclose(3000);
        return redirect()->back();
    }

    public function getReview($rid){
        $review = Review::find($rid);
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('reviews.show', ['review' => $review, 'wishes' => $wishes])->withTitle("Review");
    }

    public function delete($id)
    {
        $review = Review::find($id);
        if(auth()->user()->id !== $review->user_id){
            Alert::error('add another one', 'Unauthorized access!');
            return redirect('/phones');
        }
        $wishes = '';
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('reviews.delete' , ['review' => $review, 'wishes' => $wishes])->withTitle("Delete Review");
//        $review->delete();
//        Alert::s('add another one', 'Review deleted!')->autoclose(3000);
//        return redirect('review');
    }

    public function deleteReview($id, $phone_id = null){
        $review = Review::where('id', '=', $id)->first();
        $review->delete();
        $pid = Phone::where('phone_id', '=', $phone_id)->first();
        $phone = Phone::where('phone_id', '=', $phone_id)->get();
//        $phone_id = DB::table('phones')->leftjoin('reviews', function ($join) {
//            $join->on('reviews.phone_id', '=', 'phones.phone_id');
//
//        })->select('phone_id')->where('id', '=', $phone_id)->get();
//        Alert::error('Review deleted!');
        if (Auth::check()) {
            $wishes = WishList::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('reviews.index', [ 'pid' => $pid,  'wishes' => $wishes, 'phone' => $phone])->withTitle("Mobile Phones");
    }

    public function updateReview(Request $req, $id){
        $review = Review::find($id);
        $review->id = $req->input('id');
        $review->user_id = $req->input('user_id');
        $review->username = $req->input('username');
        $review->phone_id = $req->input('phone_id');
        $review->review = $req->input('review');
        $review->save();
        Alert::success('Review updated!');
        return redirect()->back();
    }

//    public function loadDataAjax(Request $request)
//    {
//        $output = '';
//        $id = $request->id;
//
//        $review = Review::where('id',$id)->orderBy('id','DESC')->limit(2)->get();
//
//        if(!$review->isEmpty())
//        {
//            foreach($review->replies as $reply)
//            {
////                $url = url('blog/'.$review->slug);
////                $username = $review->username;
////                $reply_review .= $review->reply_review;
//
//                $output .= '<div class="mdl-grid mdl-cell mdl-cell--12-col  mdl-shadow--4dp">
//                                <div class="post">
//                                    <a class="nounderline" ><h2 class="post-title" >'.$reply->username.'</h2></a>
//                                    <div class="row">
//                                       <div class="col-md-6">
////                                           <h5 class="post-date" >Published:'.date('M j, Y', strtotime($reply->created_at)).'</h5>
//                                       </div>
//                                   </div>
//                                </div>
//                            </div>';
//            }
//
//            $output .= '<div id="remove-row">
//                            <button id="btn-more" data-id="'.$reply->id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
//                        </div>';
//
//            echo $output;
//        }
//    }
}
