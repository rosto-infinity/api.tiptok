---
name: framework-docs
description: "Index et manuels d'architecture hors-ligne d'ApiTipTok (Laravel 13, Fortify, Sanctum, Socialite, Reverb WebSockets, Spatie Roles & Permissions, Multi-roles, Pest Testing, Eloquent, Queues). Toujours consulter ce skill pour concevoir, implémenter ou débugger les API, l'auth, les permissions et le temps réel."
---

# ApiTipTok Framework Documentation & Architecture Library

Ce référentiel indexe **238 guides et manuels techniques** issus du dossier [`agents-docs-framework/`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework).

---

## Sommaire Rapide

| Module | Description | Fichiers |
|---|---|---|
| [1. Guide Multi-Rôles & Architecture des Permissions (Laravel 13)](#guide-roles-permissions) | Architecture conceptuelle pour la gestion multi-rôles active, seeders déterministes, intégration Sanctum/JWT et commutation de rôle stateless. | **7 docs** |
| [2. Documentation Spatie Laravel Permission](#spatie-laravel-permitions) | Guide exhaustif Spatie Permission : rôles, permissions directes, wildcards, équipes (teams), enums, politiques d'accès, gestion du cache, et UUIDs. | **25 docs** |
| [3. Laravel Fortify (Headless Auth, 2FA, Passkeys)](#laravel-fortify) | Authentification headless, sécurité 2FA, clés d'accès Passkeys, confirmation de mot de passe et réinitialisation sécurisée. | **2 docs** |
| [4. Laravel Sanctum (API Tokens & Authentification SPA)](#LaravelSanctum) | Gestion des jetons personnels d'accès (Personal Access Tokens), protection CSRF pour SPA/mobile, et middlewares d'authentification. | **1 docs** |
| [5. Laravel Socialite (OAuth & Connexion Google)](#LaravelSocialite) | Authentification tierce OAuth 2.0 (Google, GitHub, etc.), architecture découplée frontend/backend et gestion des tokens OAuth. | **3 docs** |
| [6. Laravel Reverb & WebSockets Broadcasting](#chat-reverb) | Serveur WebSockets haute performance natif, canaux privés et de présence (presence channels), authentification et intégration Laravel Echo. | **2 docs** |
| [7. Pest PHP Testing Framework](#pest) | Tests unitaires et fonctionnels avec Pest : attentes (expectations), hooks de cycle de vie, datasets paramétrés et gestion des exceptions. | **5 docs** |
| [8. Laravel 13 Core & Modernisation](#laravel13) | Spécificités et nouveautés Laravel 13 : routage moderne, middlewares simplifiés dans bootstrap/app.php, requêtes HTTP, injection de dépendances et Eloquent ORM. | **55 docs** |
| [9. Laravel Deep Guides (API, Eloquent, Queues, Routing, Testing)](#laravel) | Modules approfondis couvrant l'API development, Eloquent avancé, files d'attente (Queues & Jobs), Blade, et tests de bout en bout. | **137 docs** |

---

<a id="guide-roles-permissions"></a>
## 1. Guide Multi-Rôles & Architecture des Permissions (Laravel 13)

> Architecture conceptuelle pour la gestion multi-rôles active, seeders déterministes, intégration Sanctum/JWT et commutation de rôle stateless.

- [📖 Fichier 1 : Architecture de Données et Concept Multi-Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/01-architecture-donnees.md) (`guide-roles-permissions/01-architecture-donnees.md`)
- [📖 Fichier 2 : Modèles Éloquents et Gestion Active des Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/02-modeles-et-traits.md) (`guide-roles-permissions/02-modeles-et-traits.md`)
- [📖 Fichier 3 : Middlewares, Autorisations et Sécurisation](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/03-middlewares-et-securite.md) (`guide-roles-permissions/03-middlewares-et-securite.md`)
- [📖 Fichier 4 : Seeders Robustes et Association Multi-Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/04-seeders-et-initialisation.md) (`guide-roles-permissions/04-seeders-et-initialisation.md`)
- [📖 Fichier 5 : Interface Utilisateur, Commutateur de Rôle et Matrice de Permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/05-interface-et-gestion-ui.md) (`guide-roles-permissions/05-interface-et-gestion-ui.md`)
- [📖 Fichier 6 : Gestion du Rôle Actif en API Stateless (Laravel 13)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/06-api-stateless-switcher.md) (`guide-roles-permissions/06-api-stateless-switcher.md`)
- [📖 Fichier 7 : Intégration Sanctum / JWT et Réponses JSON (Laravel 13)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/07-jwt-sanctum-integration.md) (`guide-roles-permissions/07-jwt-sanctum-integration.md`)

---

<a id="spatie-laravel-permitions"></a>
## 2. Documentation Spatie Laravel Permission

> Guide exhaustif Spatie Permission : rôles, permissions directes, wildcards, équipes (teams), enums, politiques d'accès, gestion du cache, et UUIDs.

- [Installation in Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/01-install.md) (`spatie-laravel-permitions/01-install.md`)
- [Upgrading](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/02-upgrading.md) (`spatie-laravel-permitions/02-upgrading.md`)
- [Basic Usage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/03-basic-usage.md) (`spatie-laravel-permitions/03-basic-usage.md`)
- [Direct Permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/04-direct-permissions.md) (`spatie-laravel-permitions/04-direct-permissions.md`)
- [Using Permissions via Roles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/05-role-permissions.md) (`spatie-laravel-permitions/05-role-permissions.md`)
- [Enums](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/06-enums.md) (`spatie-laravel-permitions/06-enums.md`)
- [Teams permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/07-teams-permissions.md) (`spatie-laravel-permitions/07-teams-permissions.md`)
- [Wildcard permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/08-wildcard-permissions.md) (`spatie-laravel-permitions/08-wildcard-permissions.md`)
- [Blade directives](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/09-blade-directives.md) (`spatie-laravel-permitions/09-blade-directives.md`)
- [Defining a Super-Admin](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/10-super-admin.md) (`spatie-laravel-permitions/10-super-admin.md`)
- [Using multiple guards](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/11-multiple-guards.md) (`spatie-laravel-permitions/11-multiple-guards.md`)
- [Artisan Commands](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/12-artisan.md) (`spatie-laravel-permitions/12-artisan.md`)
- [Middleware](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/13-middleware.md) (`spatie-laravel-permitions/13-middleware.md`)
- [Passport Client Credentials Grant usage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/14-passport.md) (`spatie-laravel-permitions/14-passport.md`)
- [Roles vs Permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/15-roles-vs-permissions.md) (`spatie-laravel-permitions/15-roles-vs-permissions.md`)
- [Model Policies](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/16-using-policies.md) (`spatie-laravel-permitions/16-using-policies.md`)
- [Performance Tips](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/17-performance.md) (`spatie-laravel-permitions/17-performance.md`)
- [Testing](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/18-testing.md) (`spatie-laravel-permitions/18-testing.md`)
- [Database Seeding](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/19-seeding.md) (`spatie-laravel-permitions/19-seeding.md`)
- [Exceptions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/20-exceptions.md) (`spatie-laravel-permitions/20-exceptions.md`)
- [Extending](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/21-extending.md) (`spatie-laravel-permitions/21-extending.md`)
- [Cache](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/22-cache.md) (`spatie-laravel-permitions/22-cache.md`)
- [Events](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/23-events.md) (`spatie-laravel-permitions/23-events.md`)
- [Custom Permission Check](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/24-custom-permission-check.md) (`spatie-laravel-permitions/24-custom-permission-check.md`)
- [UUID/ULID](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/25-uuid.md) (`spatie-laravel-permitions/25-uuid.md`)

---

<a id="laravel-fortify"></a>
## 3. Laravel Fortify (Headless Auth, 2FA, Passkeys)

> Authentification headless, sécurité 2FA, clés d'accès Passkeys, confirmation de mot de passe et réinitialisation sécurisée.

- [Laravel Fortify - Guide Complet](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel-fortify/fortify.md) (`laravel-fortify/fortify.md`)
- [Laravel Fortify - Passkeys & WebAuthn](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel-fortify/passkey.md) (`laravel-fortify/passkey.md`)

---

<a id="LaravelSanctum"></a>
## 4. Laravel Sanctum (API Tokens & Authentification SPA)

> Gestion des jetons personnels d'accès (Personal Access Tokens), protection CSRF pour SPA/mobile, et middlewares d'authentification.

- [Laravel Sanctum](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSanctum/sanctum.md) (`LaravelSanctum/sanctum.md`)

---

<a id="LaravelSocialite"></a>
## 5. Laravel Socialite (OAuth & Connexion Google)

> Authentification tierce OAuth 2.0 (Google, GitHub, etc.), architecture découplée frontend/backend et gestion des tokens OAuth.

- [GOOGLE_CLIENT_ID=your_google_client_id](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSocialite/auth-Id.md) (`LaravelSocialite/auth-Id.md`)
- [Connexion Google OAuth 2.0 (Architecture Découplée Obryl)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSocialite/auth-google.md) (`LaravelSocialite/auth-google.md`)
- [Laravel Socialite](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSocialite/socialite.md) (`LaravelSocialite/socialite.md`)

---

<a id="chat-reverb"></a>
## 6. Laravel Reverb & WebSockets Broadcasting

> Serveur WebSockets haute performance natif, canaux privés et de présence (presence channels), authentification et intégration Laravel Echo.

- [Broadcasting](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/broadcasting.md) (`chat-reverb/broadcasting.md`)
- [Laravel Reverb](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/reverb.md) (`chat-reverb/reverb.md`)

---

<a id="pest"></a>
## 7. Pest PHP Testing Framework

> Tests unitaires et fonctionnels avec Pest : attentes (expectations), hooks de cycle de vie, datasets paramétrés et gestion des exceptions.

- [Your First Test](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/01-writing-tests.md) (`pest/01-writing-tests.md`)
- [Hooks](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/02-hooks.md) (`pest/02-hooks.md`)
- [Datasets](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/03-datasets.md) (`pest/03-datasets.md`)
- [Exceptions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/04-exceptions.md) (`pest/04-exceptions.md`)
- [Expectations](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/expectations.md) (`pest/expectations.md`)

---

<a id="laravel13"></a>
## 8. Laravel 13 Core & Modernisation

> Spécificités et nouveautés Laravel 13 : routage moderne, middlewares simplifiés dans bootstrap/app.php, requêtes HTTP, injection de dépendances et Eloquent ORM.

- [Routing](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/01-routing.md) (`laravel13/01-TheBasics/01-routing.md`)
- [Middleware](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/02-middleware.md) (`laravel13/01-TheBasics/02-middleware.md`)
- [CSRF Protection](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/03-csrf.md) (`laravel13/01-TheBasics/03-csrf.md`)
- [Controllers](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/04-controllers.md) (`laravel13/01-TheBasics/04-controllers.md`)
- [HTTP Requests](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/05-requests.md) (`laravel13/01-TheBasics/05-requests.md`)
- [HTTP Responses](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/06-responses.md) (`laravel13/01-TheBasics/06-responses.md`)
- [Views](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/07-views.md) (`laravel13/01-TheBasics/07-views.md`)
- [Blade Templates](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/08-blade.md) (`laravel13/01-TheBasics/08-blade.md`)
- [Asset Bundling (Vite)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/09-vite.md) (`laravel13/01-TheBasics/09-vite.md`)
- [URL Generation](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/10-urls.md) (`laravel13/01-TheBasics/10-urls.md`)
- [HTTP Session](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/11-session.md) (`laravel13/01-TheBasics/11-session.md`)
- [Validation](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/12-validation.md) (`laravel13/01-TheBasics/12-validation.md`)
- [Logging](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/13-logging.md) (`laravel13/01-TheBasics/13-logging.md`)
- [Cache](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/Cache.md) (`laravel13/01-TheBasics/Cache.md`)
- [Collections](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/Collections.md) (`laravel13/01-TheBasics/Collections.md`)
- [Concurrency](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/concurrency.md) (`laravel13/01-TheBasics/concurrency.md`)
- [Context](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/context.md) (`laravel13/01-TheBasics/context.md`)
- [Contracts](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/contracts.md) (`laravel13/01-TheBasics/contracts.md`)
- [Events](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/events.md) (`laravel13/01-TheBasics/events.md`)
- [File Storage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/filesystem.md) (`laravel13/01-TheBasics/filesystem.md`)
- [Helpers](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/helpers.md) (`laravel13/01-TheBasics/helpers.md`)
- [HTTP Client](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/http-client.md) (`laravel13/01-TheBasics/http-client.md`)
- [Localization](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/localization.md) (`laravel13/01-TheBasics/localization.md`)
- [Mail](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/mail.md) (`laravel13/01-TheBasics/mail.md`)
- [Notifications](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/01-TheBasics/notifications.md) (`laravel13/01-TheBasics/notifications.md`)
- [Artisan Console](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/01-artisan.md) (`laravel13/02-DiggingDeeper/01-artisan.md`)
- [Broadcasting](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/02-broadcasting.md) (`laravel13/02-DiggingDeeper/02-broadcasting.md`)
- [Cache](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/02-cache.md) (`laravel13/02-DiggingDeeper/02-cache.md`)
- [Collections](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/04-collections.md) (`laravel13/02-DiggingDeeper/04-collections.md`)
- [Concurrency](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/05-concurrency.md) (`laravel13/02-DiggingDeeper/05-concurrency.md`)
- [Context](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/06-context.md) (`laravel13/02-DiggingDeeper/06-context.md`)
- [Contracts](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/07-contracts.md) (`laravel13/02-DiggingDeeper/07-contracts.md`)
- [Events](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/08-events.md) (`laravel13/02-DiggingDeeper/08-events.md`)
- [File Storage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/09-filesystem.md) (`laravel13/02-DiggingDeeper/09-filesystem.md`)
- [Helpers](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/10-helpers.md) (`laravel13/02-DiggingDeeper/10-helpers.md`)
- [HTTP Client](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/11-http-client.md) (`laravel13/02-DiggingDeeper/11-http-client.md`)
- [Mail](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/12-mail.md) (`laravel13/02-DiggingDeeper/12-mail.md`)
- [Notifications](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/13-notifications.md) (`laravel13/02-DiggingDeeper/13-notifications.md`)
- [Strings](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-DiggingDeeper/14-strings.md) (`laravel13/02-DiggingDeeper/14-strings.md`)
- [Database: Getting Started](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/01-database.md) (`laravel13/02-database/01-database.md`)
- [Database: Query Builder](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/02-queries.md) (`laravel13/02-database/02-queries.md`)
- [Database: Pagination](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/03-pagination.md) (`laravel13/02-database/03-pagination.md`)
- [Database: Getting Started](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/04-migrations.md) (`laravel13/02-database/04-migrations.md`)
- [Database: Seeding](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/05-seeding.md) (`laravel13/02-database/05-seeding.md`)
- [Redis](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/02-database/06-redis.md) (`laravel13/02-database/06-redis.md`)
- [Eloquent: Getting Started](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/01-eloquent.md) (`laravel13/03-EloquentORM/01-eloquent.md`)
- [Eloquent: Relationships](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/02-eloquent-relationships.md) (`laravel13/03-EloquentORM/02-eloquent-relationships.md`)
- [Eloquent: Collections](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/03-eloquent-collections.md) (`laravel13/03-EloquentORM/03-eloquent-collections.md`)
- [Eloquent: Mutators & Casting](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/04-eloquent-mutators.md) (`laravel13/03-EloquentORM/04-eloquent-mutators.md`)
- [Eloquent: API Resources](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/05-eloquent-resources.md) (`laravel13/03-EloquentORM/05-eloquent-resources.md`)
- [Eloquent: Serialization](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/06-eloquent-serialization.md) (`laravel13/03-EloquentORM/06-eloquent-serialization.md`)
- [Eloquent: Factories](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/03-EloquentORM/07-eloquent-factories.md) (`laravel13/03-EloquentORM/07-eloquent-factories.md`)
- [Master Plan de Modernisation : ESCA Gestion (v2.0)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/MASTER_MODERNIZATION_PLAN.md) (`laravel13/MASTER_MODERNIZATION_PLAN.md`)
- [Mail](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/mail.md) (`laravel13/mail.md`)
- [Upgrade Guide](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel13/updating-dependencies.md) (`laravel13/updating-dependencies.md`)

---

<a id="laravel"></a>
## 9. Laravel Deep Guides (API, Eloquent, Queues, Routing, Testing)

> Modules approfondis couvrant l'API development, Eloquent avancé, files d'attente (Queues & Jobs), Blade, et tests de bout en bout.

- [Introduction aux API REST dans Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/1-api-basics/1-to-apis.md) (`laravel/laravel-api-development/1-api-basics/1-to-apis.md`)
- [Ressources d'API (API Resources) : Transformer les Données](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/1-api-basics/2-api-resources.md) (`laravel/laravel-api-development/1-api-basics/2-api-resources.md`)
- [Validation et Gestion des Erreurs d'API (API Validation and Error Handling)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/1-api-basics/3-api-validation.md) (`laravel/laravel-api-development/1-api-basics/3-api-validation.md`)
- [📡 Fondamentaux des API (API Fundamentals)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/1-api-basics/README.md) (`laravel/laravel-api-development/1-api-basics/README.md`)
- [Introduction à Laravel Sanctum](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/2-api-authentication/1-sanctum-introduction.md) (`laravel/laravel-api-development/2-api-authentication/1-sanctum-introduction.md`)
- [Limitation de Débit d'API (API Rate Limiting)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/2-api-authentication/2-rate-limiting.md) (`laravel/laravel-api-development/2-api-authentication/2-rate-limiting.md`)
- [Versionnage d'API (API Versioning)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/2-api-authentication/3-api-versioning.md) (`laravel/laravel-api-development/2-api-authentication/3-api-versioning.md`)
- [🔒 Authentification d'API avec Sanctum (API Authentication)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/2-api-authentication/README.md) (`laravel/laravel-api-development/2-api-authentication/README.md`)
- [Tester les Endpoints d'API (Testing API Endpoints)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/3-api-testing-docs/1-testing-basics.md) (`laravel/laravel-api-development/3-api-testing-docs/1-testing-basics.md`)
- [Générer la Documentation d'API (API Documentation)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/3-api-testing-docs/2-api-documentation.md) (`laravel/laravel-api-development/3-api-testing-docs/2-api-documentation.md`)
- [📋 Tests et Documentation d'API (API Testing & Documentation)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/3-api-testing-docs/README.md) (`laravel/laravel-api-development/3-api-testing-docs/README.md`)
- [🔌 Développement d'API Laravel (API Development)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-api-development/README.md) (`laravel/laravel-api-development/README.md`)
- [Comprendre l'Authentification de Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/1-authentication-basics/1-understanding-auth.md) (`laravel/laravel-authentication/1-authentication-basics/1-understanding-auth.md`)
- [Implémentation de l'Authentification Manuelle](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/1-authentication-basics/2-manual-authentication.md) (`laravel/laravel-authentication/1-authentication-basics/2-manual-authentication.md`)
- [Vérification d'E-mail (Email Verification)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/1-authentication-basics/3-email-verification.md) (`laravel/laravel-authentication/1-authentication-basics/3-email-verification.md`)
- [🔑 Bases de l'Authentification (Authentication Fundamentals)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/1-authentication-basics/README.md) (`laravel/laravel-authentication/1-authentication-basics/README.md`)
- [L'Autorisation avec les Gates (Portes)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/2-authorization/1-gates-introduction.md) (`laravel/laravel-authentication/2-authorization/1-gates-introduction.md`)
- [L'Autorisation avec les Policies (Stratégies)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/2-authorization/2-authentication-policies.md) (`laravel/laravel-authentication/2-authorization/2-authentication-policies.md`)
- [Implémenter des Rôles et des Permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/2-authorization/3-roles-permissions.md) (`laravel/laravel-authentication/2-authorization/3-roles-permissions.md`)
- [🚦 Autorisation : Gates & Policies](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/2-authorization/README.md) (`laravel/laravel-authentication/2-authorization/README.md`)
- [Les Fondamentaux de Laravel Sanctum](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/3-api-token-auth/1-sanctum-fundamentals.md) (`laravel/laravel-authentication/3-api-token-auth/1-sanctum-fundamentals.md`)
- [Capacités et Portées des Jetons (Token Abilities & Scopes)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/3-api-token-auth/2-token-abilities.md) (`laravel/laravel-authentication/3-api-token-auth/2-token-abilities.md`)
- [🎟️ Authentification par Jeton API (API Token Auth)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/3-api-token-auth/README.md) (`laravel/laravel-authentication/3-api-token-auth/README.md`)
- [Authentification Sociale avec Socialite](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/4-oauth2-implementation/1-socialite-oauth.md) (`laravel/laravel-authentication/4-oauth2-implementation/1-socialite-oauth.md`)
- [Construire un Serveur OAuth2 avec Passport](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/4-oauth2-implementation/2-oauth-server.md) (`laravel/laravel-authentication/4-oauth2-implementation/2-oauth-server.md`)
- [🔗 Implémentation OAuth2 (OAuth2 Implementation)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/4-oauth2-implementation/README.md) (`laravel/laravel-authentication/4-oauth2-implementation/README.md`)
- [Authentification à Deux Facteurs (2FA)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/5-advanced-security/1-factor-auth.md) (`laravel/laravel-authentication/5-advanced-security/1-factor-auth.md`)
- [Meilleures Pratiques de Sécurité (Security Best Practices)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/5-advanced-security/2-best-practices.md) (`laravel/laravel-authentication/5-advanced-security/2-best-practices.md`)
- [🛡️ Modèles de Sécurité Avancés (Advanced Security Patterns)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/5-advanced-security/README.md) (`laravel/laravel-authentication/5-advanced-security/README.md`)
- [🔐 Authentification et Autorisation Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-authentication/README.md) (`laravel/laravel-authentication/README.md`)
- [Introduction aux Templates Blade](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/1-blade-basics/1-to-blade.md) (`laravel/laravel-blade-views/1-blade-basics/1-to-blade.md`)
- [Les Directives Blade](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/1-blade-basics/2-blade-directives.md) (`laravel/laravel-blade-views/1-blade-basics/2-blade-directives.md`)
- [Formulaires et Protection CSRF](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/1-blade-basics/3-forms-csrf.md) (`laravel/laravel-blade-views/1-blade-basics/3-forms-csrf.md`)
- [📝 Les Fondamentaux de Blade](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/1-blade-basics/README.md) (`laravel/laravel-blade-views/1-blade-basics/README.md`)
- [Héritage de Templates avec @extends](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/2-layouts-inheritance/1-template-inheritance.md) (`laravel/laravel-blade-views/2-layouts-inheritance/1-template-inheritance.md`)
- [Les Composants Blade (Blade Components)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/2-layouts-inheritance/2-blade-components.md) (`laravel/laravel-blade-views/2-layouts-inheritance/2-blade-components.md`)
- [Construire des Composants Pratiques](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/2-layouts-inheritance/3-practical-components.md) (`laravel/laravel-blade-views/2-layouts-inheritance/3-practical-components.md`)
- [🏗️ Mises en page (Layouts) et Héritage de Templates](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/2-layouts-inheritance/README.md) (`laravel/laravel-blade-views/2-layouts-inheritance/README.md`)
- [Introduction à Vite dans Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/3-asset-bundling-vite/1-vite-fundamentals.md) (`laravel/laravel-blade-views/3-asset-bundling-vite/1-vite-fundamentals.md`)
- [Configuration Avancée de Vite](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/3-asset-bundling-vite/2-vite-advanced.md) (`laravel/laravel-blade-views/3-asset-bundling-vite/2-vite-advanced.md`)
- [⚡ Regroupement de fichiers statiques (Assets) avec Vite](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/3-asset-bundling-vite/README.md) (`laravel/laravel-blade-views/3-asset-bundling-vite/README.md`)
- [Introduction à Livewire](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/4-livewire-basics/1-livewire-introduction.md) (`laravel/laravel-blade-views/4-livewire-basics/1-livewire-introduction.md`)
- [Formulaires et Validation avec Livewire](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/4-livewire-basics/2-forms-validation.md) (`laravel/laravel-blade-views/4-livewire-basics/2-forms-validation.md`)
- [🔌 Les Fondamentaux de Livewire](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/4-livewire-basics/README.md) (`laravel/laravel-blade-views/4-livewire-basics/README.md`)
- [Introduction à Inertia.js](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/5-inertia-integration/1-inertia-introduction.md) (`laravel/laravel-blade-views/5-inertia-integration/1-inertia-introduction.md`)
- [🚀 Intégration d'Inertia.js](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/5-inertia-integration/README.md) (`laravel/laravel-blade-views/5-inertia-integration/README.md`)
- [Design Responsif avec Tailwind CSS](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/6-responsive-design/1-tailwind-responsive.md) (`laravel/laravel-blade-views/6-responsive-design/1-tailwind-responsive.md`)
- [📱 Modèles de Conception Responsifs (Responsive Design Patterns)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/6-responsive-design/README.md) (`laravel/laravel-blade-views/6-responsive-design/README.md`)
- [📄 Moteur de Templates Laravel Blade](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-blade-views/README.md) (`laravel/laravel-blade-views/README.md`)
- [Qu'est-ce qu'Eloquent ORM ?](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/1-eloquent-basics/1-is-eloquent.md) (`laravel/laravel-eloquent-orm/1-eloquent-basics/1-is-eloquent.md`)
- [Création de Modèles Eloquent](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/1-eloquent-basics/2-creating-models.md) (`laravel/laravel-eloquent-orm/1-eloquent-basics/2-creating-models.md`)
- [Opérations CRUD avec Eloquent](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/1-eloquent-basics/3-crud-operations.md) (`laravel/laravel-eloquent-orm/1-eloquent-basics/3-crud-operations.md`)
- [Construction Avancée de Requêtes (Query Builder)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/1-eloquent-basics/4-query-builder.md) (`laravel/laravel-eloquent-orm/1-eloquent-basics/4-query-builder.md`)
- [📦 Les Fondamentaux d'Eloquent (Eloquent Fundamentals)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/1-eloquent-basics/README.md) (`laravel/laravel-eloquent-orm/1-eloquent-basics/README.md`)
- [Comprendre les Migrations de Base de Données](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/2-migrations/1-understanding-migrations.md) (`laravel/laravel-eloquent-orm/2-migrations/1-understanding-migrations.md`)
- [Types de Colonnes et Modificateurs (Migrations)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/2-migrations/2-column-types.md) (`laravel/laravel-eloquent-orm/2-migrations/2-column-types.md`)
- [Modifier des Tables Existantes](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/2-migrations/3-modifying-tables.md) (`laravel/laravel-eloquent-orm/2-migrations/3-modifying-tables.md`)
- [📋 Migrations de Base de Données (Database Migrations)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/2-migrations/README.md) (`laravel/laravel-eloquent-orm/2-migrations/README.md`)
- [Relations Un-à-Un (One-to-One)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/3-relationships/1-one-relationships.md) (`laravel/laravel-eloquent-orm/3-relationships/1-one-relationships.md`)
- [Relations Un-à-Plusieurs (One-to-Many)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/3-relationships/2-many-relationships.md) (`laravel/laravel-eloquent-orm/3-relationships/2-many-relationships.md`)
- [Relations Plusieurs-à-Plusieurs (Many-to-Many)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/3-relationships/3-many-relationships.md) (`laravel/laravel-eloquent-orm/3-relationships/3-many-relationships.md`)
- [Le Chargement Anticipé (Eager Loading) et le Problème N+1](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/3-relationships/4-eager-loading.md) (`laravel/laravel-eloquent-orm/3-relationships/4-eager-loading.md`)
- [🔗 Les Relations Eloquent (Eloquent Relationships)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/3-relationships/README.md) (`laravel/laravel-eloquent-orm/3-relationships/README.md`)
- [Introduction aux Événements de Modèles (Model Events)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/4-model-events-observers/1-events-introduction.md) (`laravel/laravel-eloquent-orm/4-model-events-observers/1-events-introduction.md`)
- [Création et Utilisation des Observateurs (Observers)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/4-model-events-observers/2-orm-observers.md) (`laravel/laravel-eloquent-orm/4-model-events-observers/2-orm-observers.md`)
- [👁️ Événements et Observateurs de Modèles (Model Events & Observers)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/4-model-events-observers/README.md) (`laravel/laravel-eloquent-orm/4-model-events-observers/README.md`)
- [Accesseurs et Mutateurs (Accessors and Mutators)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/5-advanced-patterns/1-accessors-mutators.md) (`laravel/laravel-eloquent-orm/5-advanced-patterns/1-accessors-mutators.md`)
- [Le Casting d'Attributs (Attribute Casting)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/5-advanced-patterns/2-attribute-casting.md) (`laravel/laravel-eloquent-orm/5-advanced-patterns/2-attribute-casting.md`)
- [Techniques d'Optimisation des Requêtes](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/5-advanced-patterns/3-query-optimization.md) (`laravel/laravel-eloquent-orm/5-advanced-patterns/3-query-optimization.md`)
- [🔬 Modèles Avancés d'Eloquent (Advanced Eloquent Patterns)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/5-advanced-patterns/README.md) (`laravel/laravel-eloquent-orm/5-advanced-patterns/README.md`)
- [🗄️ Laravel Eloquent ORM](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-eloquent-orm/README.md) (`laravel/laravel-eloquent-orm/README.md`)
- [Qu'est-ce que Laravel ?](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/1-getting-started/1-is-laravel.md) (`laravel/laravel-foundations/1-getting-started/1-is-laravel.md`)
- [Configurer votre Environnement Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/1-getting-started/2-up-environment.md) (`laravel/laravel-foundations/1-getting-started/2-up-environment.md`)
- [Créer votre Premier Projet Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/1-getting-started/3-first-project.md) (`laravel/laravel-foundations/1-getting-started/3-first-project.md`)
- [L'Interface en Ligne de Commande Artisan](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/1-getting-started/4-artisan-cli.md) (`laravel/laravel-foundations/1-getting-started/4-artisan-cli.md`)
- [🚀 Premiers Pas avec Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/1-getting-started/README.md) (`laravel/laravel-foundations/1-getting-started/README.md`)
- [Comprendre la Configuration de Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/2-configuration/1-configuration-basics.md) (`laravel/laravel-foundations/2-configuration/1-configuration-basics.md`)
- [Variables d'Environnement et Fichiers .env](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/2-configuration/2-environment-variables.md) (`laravel/laravel-foundations/2-configuration/2-environment-variables.md`)
- [Fournisseurs de Services (Service Providers) et Initialisation](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/2-configuration/3-service-providers.md) (`laravel/laravel-foundations/2-configuration/3-service-providers.md`)
- [⚙️ Configuration et Environnement](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/2-configuration/README.md) (`laravel/laravel-foundations/2-configuration/README.md`)
- [Le Cycle de Vie d'une Requête Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/3-request-lifecycle/1-lifecycle-overview.md) (`laravel/laravel-foundations/3-request-lifecycle/1-lifecycle-overview.md`)
- [Travailler avec les Requêtes HTTP](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/3-request-lifecycle/2-request-object.md) (`laravel/laravel-foundations/3-request-lifecycle/2-request-object.md`)
- [Créer des Réponses HTTP](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/3-request-lifecycle/3-http-responses.md) (`laravel/laravel-foundations/3-request-lifecycle/3-http-responses.md`)
- [🔄 Cycle de Vie d'une Requête](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/3-request-lifecycle/README.md) (`laravel/laravel-foundations/3-request-lifecycle/README.md`)
- [Planifier votre Application](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/1-project-planning.md) (`laravel/laravel-foundations/4-building-first-app/1-project-planning.md`)
- [Configurer la Base de Données](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/2-database-setup.md) (`laravel/laravel-foundations/4-building-first-app/2-database-setup.md`)
- [Créer des Modèles Eloquent](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/3-creating-models.md) (`laravel/laravel-foundations/4-building-first-app/3-creating-models.md`)
- [Créer des Routes et des Contrôleurs](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/4-routes-controllers.md) (`laravel/laravel-foundations/4-building-first-app/4-routes-controllers.md`)
- [Construire les Vues](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/5-creating-views.md) (`laravel/laravel-foundations/4-building-first-app/5-creating-views.md`)
- [🏗️ Construire votre Première Application](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/4-building-first-app/README.md) (`laravel/laravel-foundations/4-building-first-app/README.md`)
- [🔺 Laravel Foundations](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-foundations/README.md) (`laravel/laravel-foundations/README.md`)
- [Introduction aux Files d'Attente (Queues)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/1-queue-fundamentals/1-to-queues.md) (`laravel/laravel-queues-jobs/1-queue-fundamentals/1-to-queues.md`)
- [Configuration des Travailleurs de File d'Attente (Queue Workers)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/1-queue-fundamentals/2-queue-workers.md) (`laravel/laravel-queues-jobs/1-queue-fundamentals/2-queue-workers.md`)
- [📬 Architecture du Système de Files d'Attente (Queue System)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/1-queue-fundamentals/README.md) (`laravel/laravel-queues-jobs/1-queue-fundamentals/README.md`)
- [Création des Classes de Tâches (Creating Job Classes)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/2-jobs/1-creating-jobs.md) (`laravel/laravel-queues-jobs/2-jobs/1-creating-jobs.md`)
- [Lancement des Tâches (Dispatching Jobs)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/2-jobs/2-dispatching-jobs.md) (`laravel/laravel-queues-jobs/2-jobs/2-dispatching-jobs.md`)
- [📦 Création & Lancement des Tâches (Creating & Dispatching Jobs)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/2-jobs/README.md) (`laravel/laravel-queues-jobs/2-jobs/README.md`)
- [Options de Configuration des Tâches (Job Configuration)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/3-job-lifecycle/1-job-configuration.md) (`laravel/laravel-queues-jobs/3-job-lifecycle/1-job-configuration.md`)
- [Gestion des Tâches Échouées (Handling Failed Jobs)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/3-job-lifecycle/2-error-handling.md) (`laravel/laravel-queues-jobs/3-job-lifecycle/2-error-handling.md`)
- [🔄 Cycle de Vie des Tâches & Gestion des Erreurs (Job Lifecycle)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/3-job-lifecycle/README.md) (`laravel/laravel-queues-jobs/3-job-lifecycle/README.md`)
- [Introduction aux Événements (Events)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/4-events-listeners/1-events-introduction.md) (`laravel/laravel-queues-jobs/4-events-listeners/1-events-introduction.md`)
- [Événements de Modèles et Observateurs (Model Events and Observers)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/4-events-listeners/2-model-events.md) (`laravel/laravel-queues-jobs/4-events-listeners/2-model-events.md`)
- [📢 Événements & Écouteurs (Events & Listeners)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/4-events-listeners/README.md) (`laravel/laravel-queues-jobs/4-events-listeners/README.md`)
- [Introduction à la Planification des Tâches (Task Scheduling)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/5-task-scheduling/1-scheduling-introduction.md) (`laravel/laravel-queues-jobs/5-task-scheduling/1-scheduling-introduction.md`)
- [Fonctionnalités Avancées de Planification (Advanced Scheduling)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/5-task-scheduling/2-advanced-scheduling.md) (`laravel/laravel-queues-jobs/5-task-scheduling/2-advanced-scheduling.md`)
- [⏰ Planification des Tâches (Task Scheduling)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/5-task-scheduling/README.md) (`laravel/laravel-queues-jobs/5-task-scheduling/README.md`)
- [Introduction aux Notifications](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/6-notifications/1-notifications-introduction.md) (`laravel/laravel-queues-jobs/6-notifications/1-notifications-introduction.md`)
- [Canaux de Notification Personnalisés (Custom Notification Channels)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/6-notifications/2-notification-channels.md) (`laravel/laravel-queues-jobs/6-notifications/2-notification-channels.md`)
- [🔔 Système de Notifications (Notifications System)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/6-notifications/README.md) (`laravel/laravel-queues-jobs/6-notifications/README.md`)
- [⚡ Traitement en Arrière-plan dans Laravel (Background Processing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-queues-jobs/README.md) (`laravel/laravel-queues-jobs/README.md`)
- [Introduction au Routage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/1-routing-basics/1-to-routing.md) (`laravel/laravel-routing-controllers/1-routing-basics/1-to-routing.md`)
- [Routes Nommées et Génération d'URL](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/1-routing-basics/2-named-routes.md) (`laravel/laravel-routing-controllers/1-routing-basics/2-named-routes.md`)
- [Plongée au cœur du Route Model Binding (Liaison Modèle-Route)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/1-routing-basics/3-model-binding.md) (`laravel/laravel-routing-controllers/1-routing-basics/3-model-binding.md`)
- [🗺️ Les Bases du Routage](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/1-routing-basics/README.md) (`laravel/laravel-routing-controllers/1-routing-basics/README.md`)
- [Introduction aux Contrôleurs](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/2-controllers/1-to-controllers.md) (`laravel/laravel-routing-controllers/2-controllers/1-to-controllers.md`)
- [Les Contrôleurs de Ressources (Resource Controllers)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/2-controllers/2-resource-controllers.md) (`laravel/laravel-routing-controllers/2-controllers/2-resource-controllers.md`)
- [Validation avec les Form Requests](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/2-controllers/3-form-requests.md) (`laravel/laravel-routing-controllers/2-controllers/3-form-requests.md`)
- [🎮 Les Contrôleurs](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/2-controllers/README.md) (`laravel/laravel-routing-controllers/2-controllers/README.md`)
- [Comprendre les Middlewares](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/3-middleware/1-understanding-middleware.md) (`laravel/laravel-routing-controllers/3-middleware/1-understanding-middleware.md`)
- [Paramètres et Réponses de Middleware](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/3-middleware/2-middleware-parameters.md) (`laravel/laravel-routing-controllers/3-middleware/2-middleware-parameters.md`)
- [Les Middlewares Intégrés de Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/3-middleware/3-in-middleware.md) (`laravel/laravel-routing-controllers/3-middleware/3-in-middleware.md`)
- [🚧 Les Middlewares](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/3-middleware/README.md) (`laravel/laravel-routing-controllers/3-middleware/README.md`)
- [🛤️ Routage & Contrôleurs Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-routing-controllers/README.md) (`laravel/laravel-routing-controllers/README.md`)
- [Introduction aux Tests dans Laravel (Introduction to Testing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/1-testing-basics/1-to-testing.md) (`laravel/laravel-testing/1-testing-basics/1-to-testing.md`)
- [Tests HTTP et Fonctionnels (HTTP and Feature Testing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/1-testing-basics/2-http-testing.md) (`laravel/laravel-testing/1-testing-basics/2-http-testing.md`)
- [Tests de Base de Données (Database Testing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/1-testing-basics/3-database-testing.md) (`laravel/laravel-testing/1-testing-basics/3-database-testing.md`)
- [📋 Fondamentaux des Tests (Testing Fundamentals)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/1-testing-basics/README.md) (`laravel/laravel-testing/1-testing-basics/README.md`)
- [Création d'Objets Fictifs dans Laravel (Mocking and Faking)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/2-mocking/1-mocking-basics.md) (`laravel/laravel-testing/2-mocking/1-mocking-basics.md`)
- [Bonnes Pratiques de Test (Testing Best Practices)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/2-mocking/2-best-practices.md) (`laravel/laravel-testing/2-mocking/2-best-practices.md`)
- [🎭 Création d'Objets Fictifs (Mocking and Faking)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/2-mocking/README.md) (`laravel/laravel-testing/2-mocking/README.md`)
- [Fondamentaux des Tests Unitaires (Unit Test Fundamentals)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/3-unit-testing/1-test-fundamentals.md) (`laravel/laravel-testing/3-unit-testing/1-test-fundamentals.md`)
- [Tester des Objets de Valeur (Value Objects) et des DTOs](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/3-unit-testing/2-value-objects.md) (`laravel/laravel-testing/3-unit-testing/2-value-objects.md`)
- [🔬 Tests Unitaires (Unit Testing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/3-unit-testing/README.md) (`laravel/laravel-testing/3-unit-testing/README.md`)
- [Démarrer avec Laravel Dusk (Getting Started)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/4-browser-testing/1-dusk-setup.md) (`laravel/laravel-testing/4-browser-testing/1-dusk-setup.md`)
- [Techniques Avancées avec Dusk (Advanced Dusk Techniques)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/4-browser-testing/2-dusk-advanced.md) (`laravel/laravel-testing/4-browser-testing/2-dusk-advanced.md`)
- [🌐 Tests Navigateur avec Dusk (Browser Testing)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/4-browser-testing/README.md) (`laravel/laravel-testing/4-browser-testing/README.md`)
- [🧪 Maîtrise des Tests Laravel (Laravel Testing Mastery)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel/laravel-testing/README.md) (`laravel/laravel-testing/README.md`)

---

## Directives Architecturales Fondamentales pour ApiTipTok

1. **Stateless API & Multi-Rôles** :
   - Consultez [`guide-roles-permissions/06-api-stateless-switcher.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/06-api-stateless-switcher.md) pour la gestion du rôle actif dans un contexte d'API sans session.
   - Utilisez le header `X-Active-Role` ou un scope de token Sanctum pour contextualiser les permissions.

2. **Permissions Spatie** :
   - Vérifiez toujours les permissions granulaires (`$user->can('...')`), jamais directement les rôles.
   - Suivez [`spatie-laravel-permitions/06-enums.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/06-enums.md) pour typer les rôles et permissions avec des `BackedEnum` PHP 8.5.

3. **Temps Réel avec Laravel Reverb** :
   - Consultez [`chat-reverb/reverb.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/reverb.md) et [`chat-reverb/broadcasting.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/broadcasting.md) pour la configuration des canaux privés / de présence et l'authentification via Sanctum.

4. **Tests Automatisés avec Pest** :
   - Utilisez les conventions de [`pest/01-writing-tests.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/01-writing-tests.md) et [`pest/expectations.md`](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/pest/expectations.md).
