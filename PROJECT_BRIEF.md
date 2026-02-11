# 📋 Brief Projet Odin - Gestionnaire de Liens Personnels

## 🎯 Objectif du projet
Créer une application web de gestion de liens personnels avec Laravel 12.49.0, permettant aux utilisateurs de sauvegarder, organiser et retrouver facilement leurs liens web favoris.

---

## 📋 User Stories

### **US-01 : Gestion du compte utilisateur**
**En tant qu'utilisateur, je veux pouvoir créer un compte personnel pour accéder à mon espace privé.**

#### **Critères d'acceptation :**
- ✅ Formulaire d'inscription avec email et mot de passe
- ✅ Formulaire de connexion sécurisé
- ✅ Déconnexion possible
- ✅ Page de profil pour modifier les informations
- ✅ Possibilité de supprimer son compte

#### **Fonctionnalités requises :**
- Inscription avec validation email
- Connexion avec mot de passe sécurisé (hashé)
- Session utilisateur persistante
- Édition des informations du profil
- Suppression de compte avec confirmation

---

### **US-02 : Statut du compte utilisateur**
**En tant qu'utilisateur, je veux que mon compte puisse être activé ou désactivé.**

#### **Critères d'acceptation :**
- ✅ Champ `is_active` dans la table users
- ✅ Middleware pour vérifier le statut du compte
- ✅ Redirection si compte désactivé
- ✅ Message d'erreur approprié

#### **Fonctionnalités requises :**
- Migration pour ajouter `is_active` à la table users
- Middleware `CheckAccountStatus`
- Protection des routes selon le statut
- Gestion des comptes désactivés

---

### **US-03 : Gestion des catégories**
**En tant qu'utilisateur, je veux créer et gérer des catégories pour organiser mes liens.**

#### **Critères d'acceptation :**
- ✅ Créer des catégories personnalisées
- ✅ Lister toutes mes catégories
- ✅ Modifier le nom d'une catégorie
- ✅ Supprimer une catégorie
- ✅ Voir combien de liens contient chaque catégorie

#### **Fonctionnalités requises :**
- CRUD complet pour les catégories
- Relation One-to-Many User ↔ Category
- Affichage du nombre de liens par catégorie
- Interface intuitive pour la gestion

---

### **US-04 : Gestion des liens**
**En tant qu'utilisateur, je veux ajouter, modifier et supprimer des liens web dans mes catégories.**

#### **Critères d'acceptation :**
- ✅ Ajouter un lien avec titre et URL
- ✅ Assigner un lien à une catégorie
- ✅ Lister tous mes liens
- ✅ Modifier un lien existant
- ✅ Supprimer un lien
- ✅ Afficher les liens par catégorie

#### **Fonctionnalités requises :**
- CRUD complet pour les liens
- Relation One-to-Many User ↔ Link
- Relation Many-to-One Link ↔ Category
- Validation des URLs
- Interface responsive

---

### **US-05 : Système de tags**
**En tant qu'utilisateur, je pouvoir ajouter des tags à mes liens pour mieux les retrouver.**

#### **Critères d'acceptation :**
- ✅ Ajouter plusieurs tags à un lien
- ✅ Tags partagés entre tous les utilisateurs (globaux)
- ✅ Voir tous les tags utilisés
- ✅ Filtrer les liens par tags
- ✅ Gérer les tags lors de l'édition

#### **Fonctionnalités requises :**
- Relation Many-to-Many Link ↔ Tag
- Tags globaux (pas de user_id)
- Table pivot `link_tag`
- Interface de gestion des tags
- Système de filtrage

---

### **US-06 : Recherche et filtrage**
**En tant qu'utilisateur, je veux pouvoir rechercher et filtrer mes liens pour trouver rapidement ce que je cherche.**

#### **Critères d'acceptation :**
- ✅ Rechercher des liens par titre
- ✅ Filtrer par catégorie
- ✅ Filtrer par tags
- ✅ Combinaison de filtres
- ✅ Interface de recherche intuitive

#### **Fonctionnalités requises :**
- Système de recherche plein texte
- Filtres multiples
- Interface de recherche/filtrage
- Résultats en temps réel

---

## 🏗️ Architecture Technique

### **Technologies requises :**
- **Backend** : Laravel 12.49.0
- **Base de données** : MySQL/MariaDB
- **Frontend** : Blade + Tailwind CSS
- **Authentification** : Laravel Breeze

### **Structure de la base de données :**
```sql
users (id, name, email, password, is_active, created_at, updated_at)
categories (id, name, user_id, created_at, updated_at)
links (id, title, url, category_id, user_id, created_at, updated_at)
tags (id, name, created_at, updated_at)
link_tag (link_id, tag_id)
```

### **Relations :**
- User (1) ↔ (N) Category
- User (1) ↔ (N) Link
- Category (1) ↔ (N) Link
- Link (N) ↔ (M) Tag (via link_tag)

---

## 🎨 Exigences de Design

### **Design unifié :**
- **Boutons principaux** : Noir avec hover gris
- **Boutons de suppression** : Rouge pour les actions destructives
- **Texte** : Noir pour meilleure lisibilité
- **Interface** : Responsive et moderne

### **Pages requises :**
1. **Dashboard** : Vue d'ensemble avec statistiques
2. **Liens** : Gestion complète des liens
3. **Catégories** : Gestion des catégories
4. **Profil** : Édition des informations
5. **Authentification** : Login/Register

---

## 📊 Fonctionnalités du Dashboard

### **Statistiques à afficher :**
- Nombre total de catégories
- Nombre total de liens
- Nombre de tags utilisés
- Nombre de liens récents (7 derniers jours)

### **Informations récentes :**
- 5 derniers liens ajoutés
- Top 5 des catégories (avec nombre de liens)
- Tags les plus populaires

---

## 🔐 Sécurité

### **Points de sécurité :**
- Hashage des mots de passe
- Protection CSRF
- Validation des entrées
- Échappement des sorties
- Vérification de l'appartenance des ressources

---

## 📱 Responsive Design

### **Support des appareils :**
- Mobile (320px+)
- Tablet (768px+)
- Desktop (1024px+)
- Large screens (1440px+)

---

## 🚀 Performance

### **Optimisations requises :**
- Eager loading des relations
- Pagination pour les listes
- Cache des données fréquemment utilisées
- Optimisation des requêtes SQL

---

## 📋 Livrables

### **Code source :**
- Application Laravel complète
- Base de données avec migrations
- Tests unitaires (optionnel)
- Documentation

### **Documentation :**
- README.md avec instructions d'installation
- Documentation technique
- Guide d'utilisation
- API documentation (si applicable)

---

## ✅ Critères de validation

### **Fonctionnalités :**
- [ ] Toutes les user stories implémentées
- [ ] Authentification sécurisée
- [ ] CRUD complet pour toutes les entités
- [ ] Design responsive et unifié
- [ ] Performance acceptable

### **Qualité :**
- [ ] Code propre et maintenable
- [ ] Respect des conventions Laravel
- [ ] Tests passants
- [ ] Documentation complète

### **Déploiement :**
- [ ] Application fonctionnelle
- [ ] Base de données configurée
- [ ] Environnement de production prêt
- [ ] Instructions d'installation claires

---

## 🎯 Échéances

### **Phase 1 (Semaine 1) :**
- Mise en place du projet Laravel
- Authentification de base
- Structure de la base de données

### **Phase 2 (Semaine 2) :**
- CRUD Categories
- CRUD Liens
- Relations de base

### **Phase 3 (Semaine 3) :**
- Système de tags
- Dashboard avec statistiques
- Design unifié

### **Phase 4 (Semaine 4) :**
- Recherche et filtrage
- Optimisations
- Tests et documentation

---

## 🏆 Succès du projet

Le projet sera considéré comme réussi si :
1. **Toutes les user stories sont implémentées**
2. **L'application est stable et sécurisée**
3. **Le design est professionnel et responsive**
4. **Le code est maintenable et documenté**
5. **L'utilisateur peut gérer efficacement ses liens**

---

*Projet Odin - Gestionnaire de Liens Personnels*
*Laravel 12.49.0 - Développement Web*
