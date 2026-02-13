@extends('layouts.app-with-sidebar')

@section('title', 'Mes Liens')

@section('header', 'Mes Liens')

@section('content')
<div class="p-6">
    <!-- Formulaire d'ajout -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ajouter un lien</h3>
        <form method="POST" action="{{ route('links.store') }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                    <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                    <input type="url" id="url" name="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('url') }}" required>
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                <select id="category_id" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags (séparés par des virgules)</label>
                <input type="text" id="tags" name="tags" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('tags') }}">
                @error('tags')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Ajouter le lien
                </button>
            </div>
        </form>
    </div>

    <!-- Filtres et recherche -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Filtres</h3>
        <form method="GET" action="{{ route('links.index') }}" class="flex flex-wrap gap-4">
            <div>
                <input type="text" name="search" placeholder="Rechercher..." class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
            </div>
            <div>
                <select name="category_id" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Toutes les catégories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="tag" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tous les tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}" {{ request('tag') == $tag->name ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Filtrer
                </button>
            </div>
        </form>
    </div>

    <!-- Liste des liens -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Mes liens</h3>
        </div>
        
        @if ($links->count() > 0)
            <div class="divide-y divide-gray-200">
                @foreach ($links as $link)
                    <div class="p-6 hover:bg-gray-50">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
<<<<<<< HEAD
                                   <h4 class="text-lg font-medium text-gray-900">
=======
                                <h4 class="text-lg font-medium text-gray-900">
>>>>>>> 3eb85aa (feat(view): add Blade views for link management)
                                    <a href="{{ $link->url }}" target="_blank" class="hover:text-blue-600 transition-colors">
                                        {{ $link->title }}
                                    </a>
                                </h4>
                                @if ($link->description)
                                    <p class="text-gray-600 mb-3">{{ $link->description }}</p>
                                @endif
                                
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                    @if ($link->category)
                                        <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                                            {{ $link->category->name }}
                                        </span>
                                    @endif
                                    
                                    @if ($link->tags->count() > 0)
                                        @foreach ($link->tags as $tag)
                                            <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    @endif
                                    
                                    <span>
                                        Ajouté le {{ $link->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-2 ml-4">
                                <button onclick="editLink({{ $link->id }})" class="px-3 py-1 bg-gray-800 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition duration-200">
                                    Modifier
                                </button>
                                
                                <form method="POST" action="{{ route('links.destroy', $link->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce lien ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Formulaire d'édition caché -->
                        <div id="edit-form-{{ $link->id }}" class="hidden mt-4 p-4 bg-gray-50 rounded-lg">
                            <form method="POST" action="{{ route('links.update', $link->id) }}" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="edit-title-{{ $link->id }}" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                                        <input type="text" id="edit-title-{{ $link->id }}" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $link->title }}" required>
                                    </div>
                                    <div>
                                        <label for="edit-url-{{ $link->id }}" class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                                        <input type="url" id="edit-url-{{ $link->id }}" name="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $link->url }}" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="edit-description-{{ $link->id }}" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea id="edit-description-{{ $link->id }}" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $link->description }}</textarea>
                                </div>
                                <div>
                                    <label for="edit-category_id-{{ $link->id }}" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                    <select id="edit-category_id-{{ $link->id }}" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $link->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="edit-tags-{{ $link->id }}" class="block text-sm font-medium text-gray-700 mb-1">Tags (séparés par des virgules)</label>
                                    <input type="text" id="edit-tags-{{ $link->id }}" name="tags" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $link->tags->pluck('name')->implode(', ') }}">
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                        Mettre à jour
                                    </button>
                                    <button type="button" onclick="cancelEdit({{ $link->id }})" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                        Annuler
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>Total : {{ $links->count() }} lien{{ $links->count() > 1 ? 's' : '' }}</span>
                    <span>Dernier ajout : {{ $links->first()->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        @else
            <div class="p-12 text-center">
                <p class="text-gray-500 mb-4">Aucun lien trouvé</p>
                <a href="{{ route('links.index') }}" class="text-blue-600 hover:text-blue-800">
                    Ajouter votre premier lien
                </a>
            </div>
        @endif
    </div>
</div>

<script>
    function editLink(id) {
        document.getElementById('edit-form-' + id).classList.remove('hidden');
    }
    
    function cancelEdit(id) {
        document.getElementById('edit-form-' + id).classList.add('hidden');
    }
</script>
@endsection
