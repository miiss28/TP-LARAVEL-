# Système de Gestion de Boutique (Laravel)

## Description générale
Ce projet est une application web développée avec le framework Laravel visant à automatiser la gestion d’une boutique. Il remplace un système manuel de gestion des clients, produits et commandes par une solution centralisée, fiable et plus rapide.

## Contexte
La gestion traditionnelle d’une boutique entraîne souvent des erreurs de saisie, des pertes d’informations et un manque de suivi des ventes. Cette application a été conçue pour résoudre ces problèmes en numérisant l’ensemble du processus de gestion.

## Objectifs principaux
- Gérer les clients de manière structurée  
- Administrer les produits et le stock  
- Enregistrer les commandes clients  
- Automatiser le calcul des montants  
- Générer des factures imprimables  
- Suivre l’historique des ventes  

## Fonctionnalités

### Gestion des clients
Ajout, modification, suppression et consultation des clients avec les informations essentielles : nom, prénom, contact, adresse et email.

### Gestion des produits
Administration complète du catalogue produit incluant la référence, le prix, la quantité en stock et la description. Une alerte est affichée lorsque le stock devient faible (≤ 5 unités).

### Gestion des commandes
Création de commandes associées à un client avec possibilité d’ajouter plusieurs produits dans une même commande. Le total est calculé automatiquement et le stock est mis à jour après validation. Le système vérifie la disponibilité avant confirmation.

### Facturation
Chaque commande validée génère une facture détaillée contenant les produits, quantités, prix et total. L’impression se fait directement via le navigateur permettant un enregistrement en PDF sans outil externe.

## Rôles
Un seul rôle est défini dans le système : administrateur. Il est responsable de la gestion complète de la boutique (clients, produits, commandes et factures).

## Technologies utilisées
- Laravel (PHP Framework)  
- Blade (moteur de templates)  
- HTML / CSS (interface utilisateur)  
- JavaScript Vanilla (interaction dynamique simple)  
- MySQL ou SQLite (base de données)  
- Git & GitHub (versioning)  

## Installation, démarrage et utilisation
Prérequis : PHP 8.1 ou plus, Composer, et un serveur local comme XAMPP ou équivalent.  
Étapes d’installation : créer le projet Laravel avec `composer create-project laravel/laravel boutique`, se placer dans le dossier avec `cd boutique`, installer les dépendances avec `composer install`, copier le fichier d’environnement avec `cp .env.example .env`, générer la clé de l’application avec `php artisan key:generate`, créer la base de données SQLite en exécutant `mkdir database` puis `touch database/database.sqlite`, lancer les migrations avec `php artisan migrate`, puis démarrer le serveur avec `php artisan serve`.  
Une fois le serveur lancé, ouvrir le navigateur à l’adresse http://localhost:8000.  
Utilisation du système : ajouter d’abord des clients, ensuite enregistrer les produits avec leur stock initial, puis créer une commande en sélectionnant un client, ajouter un ou plusieurs produits à la commande, valider pour générer automatiquement le total et mettre à jour le stock, puis consulter l’historique des commandes et imprimer la facture via le navigateur.

Fatimé Tchallou Mouhyddine
