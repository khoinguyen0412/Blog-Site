@extends('layouts.app')
@section('content')

    @if (session()->has('message'))
    <div class="p-3 bg-success text-white" id="successMessage">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                <p>This is Khoi's blog, Please sign in to see all the articles</p>
            </div>
        </div>
    </div>
@endsection