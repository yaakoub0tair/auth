# 🚀 Commandes Laravel Essentielles

## 📋 Sommaire
1. [Artisan](#1-artisan)
2. [Migration](#2-migration)
3. [Modèle](#3-modèle)
4. [Contrôleur](#4-contrôleur)
5. [Route](#5-route)
6. [Authentification](#6-authentification)
7. [Base de données](#7-base-de-données)
8. [Développement](#8-développement)

---

## 1. Artisan

### 🛠️ Commandes de base
```bash
# Lister toutes les commandes
php artisan list

# Aide sur une commande
php artisan help migrate
```

### 🚀 Serveur de développement
```bash
# Démarrer le serveur
php artisan serve

# Sur un port spécifique
php artisan serve --host=127.0.0.1 --port=8001
```

---

## 2. Migration

### 📦 Créer des migrations
```bash
# Créer une migration
php artisan make:migration create_users_table

# Créer une migration avec modèle
php artisan make:migration create_posts_table --create=posts

# Ajouter une colonne
php artisan make:migration add_user_id_to_posts_table --table=posts
```

### 🔄 Exécuter les migrations
```bash
# Exécuter toutes les migrations
php artisan migrate

# Rafraîchir la base de données (développement)
php artisan migrate:fresh

# Réinitialiser et ré-exécuter toutes les migrations
php artisan migrate:refresh

# Annuler la dernière migration
php artisan migrate:rollback
```

---

## 3. Modèle

### 📝 Créer des modèles
```bash
# Créer un modèle
php artisan make:model Post

# Créer un modèle avec migration
php artisan make:model Post -m

# Créer un modèle avec migration et contrôleur
php artisan make:model Post -mcr
```

---

## 4. Contrôleur

### 🎮 Créer des contrôleurs
```bash
# Créer un contrôleur simple
php artisan make:controller PostController

# Créer un contrôleur avec méthodes CRUD
php artisan make:controller PostController --resource

# Créer un contrôleur API
php artisan make:controller PostController --api
```

---

## 5. Route

### 🛣️ Afficher les routes
```bash
# Lister toutes les routes
php artisan route:list

# Vider le cache des routes
php artisan route:clear
```

---

## 6. Authentification

### 🔐 Installation Breeze
```bash
# Installer Laravel Breeze
composer require laravel/breeze

# Installer avec Blade
php artisan breeze:install blade
```

---

## 7. Base de données

### 🗄️ Seeder (remplissage)
```bash
# Créer un seeder
php artisan make:seeder UserSeeder

# Exécuter tous les seeders
php artisan db:seed

# Exécuter un seeder spécifique
php artisan db:seed --class=UserSeeder

# Rafraîchir la base et exécuter les seeders
php artisan migrate:fresh --seed
```

---

## 8. Développement

### 🎨 Assets
```bash
# Installer les dépendances npm
npm install

# Compiler les assets
npm run dev

# Compiler en mode production
npm run build
```

### 📊 Cache
```bash
# Vider le cache de l'application
php artisan cache:clear

# Vider le cache de configuration
php artisan config:clear

# Vider le cache des vues
php artisan view:clear

# Vider tous les caches
php artisan optimize:clear
```

---

## 🎯 Commandes utiles du projet Odin

### 📋 Commandes utilisées dans le projet
```bash
# Créer les tables du projet
php artisan make:migration create_categories_table
php artisan make:migration create_links_table
php artisan make:migration create_tags_table
php artisan make:migration create_link_tag_table
php artisan make:migration add_is_active_to_users_table

# Créer les modèles
php artisan make:model Category
php artisan make:model Link
php artisan make:model Tag

# Créer les contrôleurs
php artisan make:controller DashboardController
php artisan make:controller LinkController --resource
php artisan make:controller CategoryController --resource

# Démarrer le projet
php artisan serve --host=127.0.0.1 --port=8001
```

---

## 🚨 Dépannage

### 🔧 Problèmes courants
```bash
# Problème de permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Problème de cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Problème d'autoloader
composer dump-autoload
```

---

## 📚 Raccourcis clavier

### ⌨️ Raccourcis utiles
```bash
# Historique des commandes
history | grep artisan

# Raccourci pour php artisan
alias pa="php artisan"

# Raccourci pour migrate
alias pm="php artisan migrate"

# Raccourci pour serveur
alias ps="php artisan serve"
```

---

## 🎯 Conseils de pro

### 💡 Bonnes pratiques
1. **Toujours utiliser les migrations** : Ne jamais modifier la base directement
2. **Valider les entrées** : Utiliser $request->validate()
3. **Utiliser les relations Eloquent** : Éviter les requêtes brutes
4. **Vider le cache** : Après modification des routes/config
5. **Utiliser les factories** : Pour les tests et seeders

### 🚨 À éviter
1. **Ne pas utiliser DB::raw()** : Risque de sécurité
2. **Ne pas mettre de logique dans les vues** : Garder les contrôleurs propres
3. **Ne pas oublier @csrf** : Protection obligatoire
4. **Ne pas exposer de mots de passe** : Toujours les hasher
5. **Ne pas ignorer la validation** : Toujours valider les entrées

---

*Guide de référence rapide pour le développement Laravel*
