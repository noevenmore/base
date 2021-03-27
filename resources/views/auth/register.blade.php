@extends('layouts.app')

@section('title',__('Register'))

@section('content')
<div class="w-full md:w-2/3 lg:w-1/2 border rounded-lg p-5 my-5 mx-auto font-medium shadow-lg">
    <!-- Validation Errors -->
    @if (count($errors))
        @foreach ($errors as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h1 class="text-2xl text-center text-gray-500">{{__('Register')}}</h1>
        <!-- Name -->
        <div>
            <label for="name">{{__('Name')}}</label>

            <input id="name" class="input" type="text" name="name" value="{{old('name')??''}}" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">{{__('Email')}}</label>

            <input id="email" class="input" type="email" name="email" value="{{old('email')??''}}" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">{{__('Password')}}</label>

            <input id="password" class="input" type="password" name="password" autocomplete="new-password" required />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">{{__('Confirm Password')}}</label>

            <input id="password_confirmation" class="input" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-green ml-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
@endsection