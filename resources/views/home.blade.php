@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col l4">
            hello
        </div>

        <div class="col l4">
            world
        </div>

        <div class="col l4">
            {{ auth()->user()->firstname }}
        </div>
    </div>

@endsection
