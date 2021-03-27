@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="text-center p-5">
    <h1 class="font-extrabold text-xl">Dashboard</h1>

    <p class="mt-3 mb-5">Hello, {{$user->name}}</p>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="btn btn-red" type="submit">{{__('Logout')}}</button>
    </form>
</div>

@endsection