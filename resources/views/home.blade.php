@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col m4">
            hello
        </div>

        <div class="col m4">
            world
        </div>

        <div class="col m4">
            {{ auth()->user()->firstname }}
        </div>
    </div>

@endsection
