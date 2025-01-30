<div class="flex items-center">
    @guest

        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                href="http://127.0.0.1:8000/login">
                Login
            </a>
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                href="http://127.0.0.1:8000/register">
                Register
            </a>
        </div>
    @endguest
    @auth
        <div class="ms-3 relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="size-9 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @endauth
    <div x-data="window.themeSwitcher()" x-init="switchTheme()" @keydown.window.tab="switchOn = false"
        class="flex items-center justify-center space-x-2">
        <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

        <template x-if="switchOn">
            <x-lucide-moon x-ref="switchButton" type="button" @click="switchOn = ! switchOn; switchTheme()"
                :class="switchOn ? 'bg-blue-600' : 'bg-neutral-200'"
                class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-6 text-black cursor-pointer bg-white">
                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                    class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
            </x-lucide-moon>
        </template>
        <template x-if="!switchOn">
            <x-lucide-sun x-ref="switchButton" type="button" @click="switchOn = ! switchOn; switchTheme()"
                :class="switchOn ? 'bg-blue-600' : 'bg-neutral-200'"
                class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-6 text-white cursor-pointer bg-[#4A4947]">
                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                    class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
            </x-lucide-sun>
        </template>
    </div>
</div>
