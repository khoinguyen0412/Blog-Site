@extends('layouts.app')
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm" style="margin-top: 10px;">Go back</a>
                <h1 class="display-one" style="margin-top:10px;">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p> 
                <hr>
                <div class = "col-md-10 offset-md-10">
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
                </div>
            </div>
        </div>
    </div>

@section('content')