---
name: spatie-permissions
description: "Spatie Laravel Permission & Architecture Multi-Rôles active pour ApiTipTok. À utiliser pour concevoir, implémenter ou auditer les rôles, permissions directes, wildcards, enums PHP, seeders, middlewares et le commutateur de rôle actif stateless."
---

# Spatie Permissions & Architecture Multi-Rôles (ApiTipTok)

Ce skill documente la gestion des autorisations et la stratégie multi-rôles pour l'API Laravel 13 ApiTipTok.

## Règles Fondamentales

1. **Toujours vérifier les permissions, jamais les rôles** :
   ```php
   // CORRECT
   if ($user->can('view-analytics')) { ... }
   
   // À ÉVITER
   if ($user->hasRole('admin')) { ... }
   ```
2. **Utiliser des Enums PHP 8.5 typés** :
   Définissez `RolesEnum` et `PermissionsEnum` comme des `BackedEnum` (`string`).
3. **Stateless API Switcher** :
   L'utilisateur peut posséder plusieurs rôles, mais un seul rôle est actif par requête API via le header `X-Active-Role` ou le token Sanctum.

## Guides de Référence Locaux

### Architecture Multi-Rôles Active
- [Architecture de Données et Concept Multi-Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/01-architecture-donnees.md)
- [Modèles Éloquents et Gestion Active des Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/02-modeles-et-traits.md)
- [Middlewares, Autorisations et Sécurisation](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/03-middlewares-et-securite.md)
- [Seeders Robustes et Association Multi-Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/04-seeders-et-initialisation.md)
- [Commutateur de Rôle Stateless API (Laravel 13)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/06-api-stateless-switcher.md)
- [Intégration Sanctum / JWT & Réponses JSON](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/guide-roles-permissions/07-jwt-sanctum-integration.md)

### Spatie Laravel Permission (25 Chapitres)
- [Installation & Configuration](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/01-install.md)
- [Permissions Directes](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/04-direct-permissions.md)
- [Permissions par Rôles](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/05-role-permissions.md)
- [Utilisation des Enums](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/06-enums.md)
- [Gestion des Équipes (Teams)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/07-teams-permissions.md)
- [Super-Admin Gate Bypass](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/10-super-admin.md)
- [Optimisation des Performances & Cache](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/17-performance.md)
- [Cache & TTL](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/22-cache.md)
- [Tests des Permissions](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/spatie-laravel-permitions/18-testing.md)
