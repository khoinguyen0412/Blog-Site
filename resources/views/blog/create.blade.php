@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/home" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>

                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <input type="hidden" id="name_holder" class="form-control" name="author_id"
                                       value="{{ Auth::user()->id }}" readonly='true'>
                            </div>      
                             <div class="control-group col-12">
                                <label for="name_holder">Username</label>
                                <input type="text" id="name_holder" class="form-control" name="name"
                                       value="{{ Auth::user()->name }}" readonly='true'>
                                <!-- <input type = "hidder" id="name"  -->
                            </div>
                            <div class="control-group col-12">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Your Title" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Post Body</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Your Post Body"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection