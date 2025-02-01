<div class="mr-20">
    <div class="flex space-x-4">
        {{-- <li>
            <a class="flex space-x-2 items-center hover:text-yellow-900 text-lg text-yellow-500"
                href="http://127.0.0.1:8000/dashboard">
                Bài viết
            </a>
        </li> --}}
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Bài viết') }}
            </x-nav-link>
        </div>
    </div>
</div>
