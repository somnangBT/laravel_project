<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ dropdownOpen: false, open: false }">
    <div class="flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link 
                    :href="Auth::user()->role == 'admin' ? route('dashboard') : route('dashboard')" 
                    :active="Auth::user()->role == 'admin' ? request()->routeIs('dashboard') : request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                    
                </x-nav-link>

                

                @if (Auth::user()->role == 'admin')
                    <x-nav-link 
                    :href="route('home')" 
                    :active="request()->routeIs('home')">
                        {{ __('Admin') }}
                    </x-nav-link>
                @endif
              

            </div>
        </div>
       
        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <div @click="dropdownOpen = !dropdownOpen" class="relative cursor-pointer">
                <button
                    type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                    aria-haspopup="true"
                    :aria-expanded="dropdownOpen.toString()"
                >
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                <!-- Dropdown Menu -->
                <div
                    x-show="dropdownOpen"
                    @click.away="dropdownOpen = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                    style="display: none;"
                >
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item w-full text-left px-4 py-2 hover:bg-gray-100">
                            <i class="bi bi-box-arrow-right"></i> {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden" x-data>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <!-- filepath: c:\xampp\htdocs\week1\resources\views\layouts\navigation.blade.php -->
<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
    <div class="px-4 flex flex-col items-center">
        <!-- Profile GIF -->
        <img 
            src="https://media4.giphy.com/media/v1.Y2lkPWVjZjA1ZTQ3bnY1YXhxNGZ0c3FpbzJzY3YxNHNwbDEzaDJpejgwMm5heGlidHc5eiZlcD12MV9naWZzX3RyZW5kaW5nJmN0PWc/g5R9dok94mrIvplmZd/200.webp" 
            alt="Developer at work" 
            class="mb-3 rounded-full shadow-lg ring-4 ring-blue-400 transition-all duration-300 hover:scale-105"
            style="width: 90px; height: 90px; object-fit: cover;"
        >
        <div class="font-bold text-lg text-gray-800">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500 mb-2">{{ Auth::user()->email }}</div>
        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs mb-2 shadow">Web Developer</span>
    </div>

    <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
            <i class="bi bi-person-circle me-1"></i> {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 transition">
                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>
</div>

