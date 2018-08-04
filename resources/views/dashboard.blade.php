@extends('layouts.master')

@include('partials.navbar_noscroll')
@section('content')
<div class="container" style="margin-top: 100px;min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <br>
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <h1 class="display-4">Your Dashboard</h1>
                        <hr class="my-4">
                        <p class="lead">
                            {{--<a class="btn btn-primary btn-sm" href="/posts/create">Create Post</a>--}}
                        </p>
                    </div>
                </div><br>
                {{--@if(count($posts)>0)--}}
                    {{--<table class="table table-bordered table-striped">--}}
                        {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Post ID</th>--}}
                                {{--<th>Post Title</th>--}}
                                {{--<th>Last updated</th>--}}
                                {{--<th colspan="2">Actions</th>--}}
                            {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                            {{--@foreach($posts as $post)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$post->id}}</td>--}}
                                    {{--<td>{{$post->title}}</td>--}}
                                    {{--<td>{{$post->updated_at}}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="/posts/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}--}}
                                            {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--}}
                                        {{--{!! Form::close() !!}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--@else--}}
                    {{--<p>You have no posts</p>--}}
                {{--@endif--}}
        </div>
    </div>
</div>
@endsection
