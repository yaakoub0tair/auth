@extends('layouts.app-with-sidebar')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tableau de bord</h2>
    
    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Catégories</p>
                    <p class="text-2xl font-bold text-gray-900">{{ Auth::user()->categories()->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Liens</p>
                    <p class="text-2xl font-bold text-gray-900">{{ Auth::user()->links()->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Tags</p>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Tag::count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-orange-100 rounded-full">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Liens récents</p>
                    <p class="text-2xl font-bold text-gray-900">{{ Auth::user()->links()->where('created_at', '>=', now()->subDays(7))->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers liens -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Derniers liens ajoutés</h3>
            <div class="space-y-3">
                @forelse (Auth::user()->links()->latest()->take(5)->get() as $link)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">{{ $link->title }}</p>
                            <p class="text-sm text-gray-500">{{ $link->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <a href="{{ $link->url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6H10"/>
                            </svg>
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Aucun lien ajouté récemment</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top catégories</h3>
            <div class="space-y-3">
                @forelse (Auth::user()->categories()->withCount('links')->orderBy('links_count', 'desc')->take(5)->get() as $category)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">{{ $category->name }}</p>
                            <p class="text-sm text-gray-500">{{ $category->links_count }} lien{{ $category->links_count > 1 ? 's' : '' }}</p>
                        </div>
                        <div class="w-16 bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ min(100, ($category->links_count / max(1, Auth::user()->links()->count())) * 100) }}%"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Aucune catégorie créée</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
