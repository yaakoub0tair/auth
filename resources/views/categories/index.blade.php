@extends('layouts.app-with-sidebar')

@section('title', 'Mes Catégories')

@section('header', 'Mes Catégories')

@section('content')
<div class="p-6">
    <!-- Formulaire d'ajout -->
    <div class="mb-8">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Ajouter une catégorie</h3>
        <form action="{{ route('categories.store') }}" method="POST" class="flex gap-3">
            @csrf
            <input type="text" name="name" placeholder="Nouvelle catégorie..." 
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg" required>
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                Ajouter
            </button>
        </form>
    </div>

    <!-- Liste des catégories -->
    <div class="space-y-4">
        @forelse ($categories as $category)
            <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-medium text-gray-900">{{ $category->name }}</h4>
                        <p class="text-sm text-gray-500">Catégorie</p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="editCategory({{ $category->id }})" class="px-3 py-1 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            Modifier
                        </button>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Formulaire de modification -->
                <div id="edit-form-{{ $category->id }}" class="hidden mt-4 pt-4 border-t">
                    <form action="{{ route('categories.update', $category) }}" method="POST" class="flex gap-3">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $category->name }}" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md" required>
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            Enregistrer
                        </button>
                        <button type="button" onclick="cancelEdit({{ $category->id }})" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                            Annuler
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune catégorie</h3>
                <p class="text-gray-500">Commencez par ajouter votre première catégorie.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    function editCategory(id) {
        document.getElementById('edit-form-' + id).classList.remove('hidden');
    }
    
    function cancelEdit(id) {
        document.getElementById('edit-form-' + id).classList.add('hidden');
    }
</script>
@endsection
