<header class="border-b border-gray-100">
    <div class="flex items-center justify-between py-3 px-6 ">
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <x-application-mark />
            </a>
        </div>
        <div class="flex items-center">
            @include('layouts.paritals.header-nav-right')
            @include('layouts.paritals.header-auth-right')
        </div>
    </div>
</header>
