# TipTok API Backend (Laravel 13)

API RESTful moderne et sécurisée propulsant l'application **TipTok** (plateforme de partage de micro-vidéos et astuces pour développeurs).

## 🚀 Stack & Technologies

* **Framework** : Laravel 13 (PHP 8.5)
* **Authentification** : Laravel Fortify (Headless, 2FA TOTP, Confirmation de mot de passe) + Laravel Sanctum (Bearer Tokens)
* **Base de données** : MySQL 8.0 (`apitiptok`, encodage `utf8mb4_unicode_ci`)
* **Temps Réel** : Laravel Reverb WebSockets (Port `:8080`)
* **Documentation Interactive** : Scramble OpenAPI 3.1 (`/docs/api`)
* **Qualité & Style** : Laravel Pint (PSR-12 strict)
* **Tests Automatisés** : Pest PHP 3 (29 tests de fonctionnalités et de sécurité)

## ⚙️ Configuration & Installation

```bash
# Copie de l'environnement
cp .env.example .env

# Installation des dépendances
composer install

# Génération de la clé applicative
php artisan key:generate

# Exécution des migrations & seeders
php artisan migrate --seed

# Lancement du serveur de développement Herd
php artisan serve --port=8006
```

## 🧪 Tests & Qualité de code

```bash
# Exécution de la suite de tests Pest
php artisan test --compact

# Formatage PSR-12 automatique
vendor/bin/pint --dirty
```

## 📖 Documentation technique complète

Consultez l'encyclopédie technique dans le dossier parent :
👉 [`../docs-tiptok/`](../docs-tiptok/README.md)
