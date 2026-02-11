<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Odin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-xl font-bold text-gray-800">Odin</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('categories.*') ? 'bg-gray-100' : '' }}">
                    Catégories
                </a>
                <a href="{{ route('links.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('links.*') ? 'bg-gray-100' : '' }}">
                    Liens
                </a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('profile.*') ? 'bg-gray-100' : '' }}">
                    Profil
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <div class="text-sm text-gray-600">{{ Auth::user()->name }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
        
        <div class="flex-1">
            <header class="bg-white shadow-sm">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('header', 'Dashboard')</h1>
                </div>
            </header>
            
            <main class="p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="mb-4 p-4 bg-yellow-100 text-yellow-700 rounded">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>

        @yield('scripts')
    </body>
</html>
