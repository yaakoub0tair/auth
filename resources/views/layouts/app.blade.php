<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @auth
                <nav class="bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                <div class="flex-shrink-0 flex items-center">
                                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-900">
                                        {{ config('app.name', 'Odin') }}
                                    </a>
                                </div>
                                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">
                                        Dashboard
                                    </a>
                                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('categories.*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">
                                        Catégories
                                    </a>
                                    <a href="{{ route('links.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('links.*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">
                                        Liens
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-3 relative">
                                    <div x-data="{ open: false }" @click.away="open = false">
                                        <button @click="open = ! open" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}">
                                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                                            <svg class="ml-2 -mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div x-show="open"
                                             x-transition:enter="transition ease-out duration-200"
                                             x-transition:enter-start="opacity-0 scale-95"
                                             x-transition:enter-end="opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-75"
                                             x-transition:leave-start="opacity-100 scale-100"
                                             x-transition:leave-end="opacity-0 scale-95"
                                             class="absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right"
                                             style="display: none;">
                                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1">
                                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Profil
                                                </a>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="button" onclick="this.closest('form').submit()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        Déconnexion
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            @endauth

            <main class="py-6">
                @yield('content')
            </main>
        </div>
    </body>
</html>
