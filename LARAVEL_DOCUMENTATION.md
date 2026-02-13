# 📚 Documentation Laravel pour Débutants

## 🎯 Objectif
Apprendre Laravel 12.49.0 avec le projet Odin comme référence pratique.

---

## 📋 Sommaire
1. [Introduction à Laravel](#1-introduction-à-laravel)
2. [Architecture MVC](#2-architecture-mvc)
3. [Base de données](#3-base-de-données)
4. [Eloquent ORM](#4-eloquent-orm)
5. [Blade Templates](#5-blade-templates)
6. [Routes](#6-routes)
7. [Middleware](#7-middleware)
8. [Authentification](#8-authentification)
9. [Contrôleurs](#9-contrôleurs)
10. [Modèles](#10-modèles)
11. [Vues](#11-vues)
12. [Bonnes pratiques](#12-bonnes-pratiques)

---

## 1. Introduction à Laravel

### 🎨 Qu'est-ce que Laravel ?
Laravel est un framework PHP moderne qui simplifie le développement web.

### 🏗️ Pourquoi Laravel ?
- **Élégant** : Syntaxe claire et expressive
- **Puissant** : Fonctionnalités intégrées
- **Communauté** : Grande documentation et support
- **Productif** : Développement rapide

### 📦 Installation
```bash
# Créer un nouveau projet Laravel
composer create-project laravel/laravel odin

# Démarrer le serveur de développement
php artisan serve

# Accéder au projet
http://127.0.0.1:8000
```

---

## 2. Architecture MVC

### 🏛️ Modèle-Vue-Contrôleur

#### **📁 Modèles (Models)**
- **Rôle** : Gérer les données de la base
- **Emplacement** : `app/Models/`
- **Exemple** : `User.php`, `Category.php`

#### **📁 Vues (Views)**
- **Rôle** : Afficher l'interface utilisateur
- **Emplacement** : `resources/views/`
- **Exemple** : `dashboard.blade.php`, `login.blade.php`

#### **📁 Contrôleurs (Controllers)**
- **Rôle** : Logique métier, traiter les requêtes
- **Emplacement** : `app/Http/Controllers/`
- **Exemple** : `DashboardController.php`, `LinkController.php`

### 🔄 Flux de données
```
Utilisateur → Route → Contrôleur → Modèle → Base de données
                ↓
            Vue ← Contrôleur ← Modèle
```

---

## 3. Base de données

### 🗄️ Migrations

#### **Qu'est-ce qu'une migration ?**
Fichier PHP qui modifie la structure de la base de données.

#### **Créer une migration**
```bash
php artisan make:migration create_categories_table
```

#### **Exemple de migration**
```php
// database/migrations/2026_02_10_140543_create_categories_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```

#### **Exécuter les migrations**
```bash
php artisan migrate
```

---

## 4. Eloquent ORM

### 🎯 Qu'est-ce qu'Eloquent ?
ORM (Object-Relational Mapping) qui transforme les tables en objets PHP.

### 📝 Créer un modèle
```bash
php artisan make:model Category
```

### 📋 Exemple de modèle
```php
// app/Models/Category.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'user_id'];
    
    // Relation One-to-Many avec les liens
    public function links()
    {
        return $this->hasMany(Link::class);
    }
    
    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

### 🔗 Types de relations

#### **One-to-Many (Un-à-plusieurs)**
```php
// Un utilisateur a plusieurs catégories
// User.php
public function categories()
{
    return $this->hasMany(Category::class);
}

// Une catégorie appartient à un utilisateur
// Category.php
public function user()
{
    return $this->belongsTo(User::class);
}
```

#### **Many-to-Many (Plusieurs-à-plusieurs)**
```php
// Un lien a plusieurs tags
// Link.php
public function tags()
{
    return $this->belongsToMany(Tag::class);
}

// Un tag a plusieurs liens
// Tag.php
public function links()
{
    return $this->belongsToMany(Link::class);
}
```

---

## 5. Blade Templates

### 🎨 Qu'est-ce que Blade ?
Moteur de templates PHP avec syntaxe simplifiée.

### 🏗️ Héritage avec @extends
```php
<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app-with-sidebar')

@section('title', 'Dashboard')

@section('content')
    <h1>Bienvenue sur le dashboard</h1>
    <p>Vous avez {{ $categories->count() }} catégories.</p>
@endsection
```

### 📦 Directives Blade courantes

#### **Affichage de variables**
```php
{{ $variable }}                    <!-- Échappé (sécurisé) -->
{!! $variable !!}                   <!-- Non échappé (HTML) -->
{{ $user->name ?? 'Invité' }}     <!-- Valeur par défaut -->
```

#### **Conditions**
```php
@if($user->is_active)
    <p>Compte actif</p>
@else
    <p>Compte désactivé</p>
@endif
```

#### **Boucles**
```php
@foreach($categories as $category)
    <div>
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->links->count() }} liens</p>
    </div>
@endforeach
```

---

## 6. Routes

### 🛣️ Qu'est-ce qu'une route ?
URL qui pointe vers une action d'un contrôleur.

### 📁 Fichier de routes
```php
// routes/web.php
```

### 🎯 Types de routes

#### **Route GET**
```php
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
```

#### **Route POST**
```php
Route::post('/links', [LinkController::class, 'store'])->name('links.store');
```

#### **Route Resource (CRUD complet)**
```php
Route::resource('categories', CategoryController::class);
```

---

## 7. Middleware

### 🛡️ Qu'est-ce qu'un middleware ?
Couche qui s'exécute avant les contrôleurs pour filtrer les requêtes.

### 📝 Exemple de middleware
```php
// app/Http/Middleware/CheckAccountStatus.php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccountStatus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        if ($user && !$user->is_active) {
            return redirect('/login')->with('error', 'Compte désactivé');
        }
        
        return $next($request);
    }
}
```

---

## 8. Authentification

### 🔐 Laravel Breeze
Package officiel pour l'authentification.

### 📦 Installation
```bash
composer require laravel/breeze
php artisan breeze:install blade
npm install
npm run build
php artisan migrate
```

### 📝 Utilisateur authentifié
```php
use Illuminate\Support\Facades\Auth;

// Vérifier si connecté
if (Auth::check()) {
    // Utilisateur connecté
}

// Obtenir l'utilisateur connecté
$user = Auth::user();
$user = auth()->user();

// Déconnecter
Auth::logout();
```

---

## 9. Contrôleurs

### 🎮 Rôle du contrôleur
Traiter les requêtes HTTP et retourner des réponses.

### 📝 Créer un contrôleur
```bash
php artisan make:controller LinkController
php artisan make:controller LinkController --resource  # Avec méthodes CRUD
```

### 📋 Exemple de contrôleur
```php
// app/Http/Controllers/LinkController.php
<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    // Afficher tous les liens
    public function index()
    {
        $links = Auth::user()->links()->with('category', 'tags')->latest()->get();
        return view('links.index', compact('links'));
    }
    
    // Enregistrer un nouveau lien
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $link = Auth::user()->links()->create([
            'title' => $request->title,
            'url' => $request->url,
            'category_id' => $request->category_id
        ]);
        
        return redirect()->back()->with('success', 'Lien créé');
    }
}
```

---

## 10. Modèles

### 📋 Rôle du modèle
Représenter une table de la base de données comme un objet PHP.

### 📝 Propriétés importantes

#### **$fillable**
```php
protected $fillable = ['name', 'user_id', 'description'];
// Colonnes autorisées pour l'assignation de masse
```

#### **Relations**
```php
// One-to-Many
public function links()
{
    return $this->hasMany(Link::class);
}

// Many-to-Many
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
```

---

## 11. Vues

### 🎨 Organisation des vues

#### **Layouts**
```php
<!-- resources/views/layouts/app-with-sidebar.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Odin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        @include('partials.navigation')
    </nav>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
```

#### **Formulaires**
```php
<!-- Formulaire de création -->
<form action="{{ route('links.store') }}" method="POST" class="space-y-4">
    @csrf
    
    <div>
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" 
               value="{{ old('title') }}" required>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit">Créer le lien</button>
</form>
```

---

## 12. Bonnes pratiques

### 🎯 Principes de base

#### **1. Convention over Configuration**
```php
// ✅ Bon
class LinkController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('links.index', compact('links'));
    }
}
```

#### **2. Single Responsibility Principle**
```php
// ✅ Bon - Chaque méthode a une responsabilité
public function store(Request $request)
{
    $validated = $request->validate([...]);
    $link = Link::create($validated);
    return redirect()->back()->with('success', 'Lien créé');
}
```

#### **3. DRY (Don't Repeat Yourself)**
```php
// ✅ Bon - Créer une méthode réutilisable
private function validateLink(Request $request)
{
    return $request->validate([
        'title' => 'required|string|max:255',
        'url' => 'required|url',
        'category_id' => 'required|exists:categories,id',
    ]);
}
```

### 🛡️ Sécurité

#### **Protection CSRF**
```php
<form method="POST">
    @csrf  <!-- Token CSRF obligatoire -->
    <!-- Contenu du formulaire -->
</form>
```

#### **Échappement des données**
```php
{{ $userInput }}     <!-- ✅ Sécurisé -->
{!! $userInput !!}    <!-- ❌ Dangereux (XSS) -->
```

---

## 🎯 Prochaines étapes

### 📚 Ressources d'apprentissage
1. **Documentation officielle** : https://laravel.com/docs
2. **Laracasts** : https://laracasts.com
3. **YouTube** : Tutoriels Laravel en français
4. **Pratique** : Créer de petits projets

### 🛠️ Projets d'entraînement
1. **Todo List** : CRUD simple
2. **Blog** : Articles avec catégories
3. **E-commerce** : Produits, panier, commandes
4. **API REST** : JSON endpoints

---

## 🎉 Conclusion

Laravel est un framework puissant qui demande de la pratique. Avec cette documentation et le projet Odin comme référence, vous avez toutes les bases pour devenir compétent.

**La clé du succès : pratiquer régulièrement !** 🚀

---

*Créé pour l'apprentissage Laravel avec le projet Odin*
