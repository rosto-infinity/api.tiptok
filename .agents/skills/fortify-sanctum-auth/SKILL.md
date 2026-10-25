---
name: fortify-sanctum-auth
description: "Authentification complète ApiTipTok : Laravel Fortify (headless, 2FA, Passkeys), Laravel Sanctum (API tokens) et Laravel Socialite (Google OAuth). À utiliser pour toute implémentation ou modification des flux de connexion, inscription, réinitialisation de mot de passe, jetons API et OAuth."
---

# Authentification Complète : Fortify, Sanctum & Socialite (ApiTipTok)

Référence d'implémentation de la pile d'authentification moderne pour l'API ApiTipTok et son frontend Vue 3.

## Piliers de l'Authentification

1. **Laravel Fortify** : Backend headless gérant l'enregistrement, la connexion, la vérification d'email, le 2FA (TOTP / codes de récupération) et les Passkeys (WebAuthn).
2. **Laravel Sanctum** : Émission de jetons API (`createToken`) et protection des routes `api/*` avec `auth:sanctum`.
3. **Laravel Socialite** : Flux OAuth 2.0 (notamment Google) adapté aux SPA/APIs découplées.

## Guides de Référence Locaux

### Laravel Fortify & Passkeys
- [Guide Laravel Fortify](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel-fortify/fortify.md)
  - Configuration de `config/fortify.php`
  - Personnalisation des pipelines de connexion
  - Authentification à deux facteurs (2FA)
- [Support des Clés d'Accès Passkeys](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/laravel-fortify/passkey.md)
  - Enregistrement des Passkeys WebAuthn
  - Connexion sans mot de passe

### Laravel Sanctum
- [Guide Laravel Sanctum](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSanctum/sanctum.md)
  - Jetons d'accès personnels (`HasApiTokens`)
  - Révocation et expiration des jetons
  - Scopes de permissions sur les jetons

### Laravel Socialite & Connexion Google
- [Connexion Google OAuth (Architecture Découplée)](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSocialite/auth-google.md)
- [Guide Socialite Général](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/LaravelSocialite/socialite.md)
