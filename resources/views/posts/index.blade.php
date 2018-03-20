@extends('layouts.master')

@section('content')

@include('partials.navbar_noscroll')
    <div class="container">
        <h1 style="margin-top: 80px;" class="text-center">Blog Posts</h1><br>
        @include('partials.messages')
        @if(count($posts)>0)
            @foreach($posts as $post)
                <div class="card">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <img src="/storage/cover_images/{{$post->cover_image}}" id="post-img-all">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-header">
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                </div>
                                <div class="card-body">
                                    {!!$post->body!!}
                                </div>
                                <div class="card-footer">
                                    <p class="card-text">Written by <b>{{$post->username}}</b></p> 
                                    <p class="card-text">Published on {{ date('M j, Y h:ia', strtotime($post->created_at) )}}</p>  
                            </div>                            
                        </div>
                    </div>

                </div> 
                <br>
            @endforeach
            {{$posts->links()}}
        @else
            <h3>No posts</h3>
        @endif
    </div>
@endsection