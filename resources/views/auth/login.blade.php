@extends('layouts.app')

@section('title',__('Login'))

@section('content')
<div class="w-full md:w-2/3 lg:w-1/2 border rounded-lg p-5 my-5 mx-auto font-medium shadow-lg">
    <!-- Session Status -->
    @if (session('status'))
        <p>{{session('status')}}</p>
    @endif

    <!-- Validation Errors -->
    @if (count($errors))
        @foreach ($errors as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="text-2xl text-center text-gray-500">{{__('Login')}}</h1>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">{{__('Email')}}</label>

            <input id="email" class="input" type="email" name="email" value="{{old('email')??''}}" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">{{__('Password')}}</label>

            <input id="password" class="input" type="password" name="password" autocomplete="current-password" required />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('Dont have account yet?') }}
            </a>

            <button type="submit" class="btn btn-green ml-4">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
@endsection