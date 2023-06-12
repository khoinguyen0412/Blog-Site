@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/home" class="btn btn-outline-primary btn-sm" style="margin-top: 10px;">Go back</a>
                <br><br>
                <p>Written by {{$post->name}}</p>
                <hr>
               
                    <h1 class="display-one" style="margin-top:10px;">{{ ucfirst($post->title) }}</h1>
                    <p>{!! $post->body !!}</p> 
                    <hr>
                    @if(Auth::user()->id == $post->author_id || Auth::user()->role_id == 1)
                    <div class = "col-md-10 offset-md-10">
                    <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                    <br><br>
                    <form id="delete-frm" class="" action="" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete Post</button>
                    </form>
                </div>
                @else
                    <div></div>
                @endif
            </div>
        </div>
    </div>

@endsection