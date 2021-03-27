<div class="flex justify-between items-center bg-gray-700 p-2 font-bold text-lg">
    <div id="logo" class="md:ml-5">
        <a class="text-white " href="/">Logo</a>
    </div>
    
    <div id="user_panel" class="md:mr-5 w-8 h-8 bg-white rounded-full flex flex-col justify-center items-center">
        @auth
            <a href="{{route('dashboard')}}">
                <img class="w-5 h-5" src="/img/male.svg" alt="User">
            </a>
        @else
            <a href="{{route('login')}}">
                <img class="w-5 h-5" src="/img/key.svg" alt="Login">
            </a>
        @endauth
    </div>
</div>