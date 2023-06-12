@extends('layouts.app')
@section('content')

    
    @if (session()->has('message'))
    <div class="p-3 bg-success text-white" id="successMessage">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>         
               
                @forelse($posts as $post)      
                <!-- Can handle an empty array -->
                    <ul>
                        <li><a href="/blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection