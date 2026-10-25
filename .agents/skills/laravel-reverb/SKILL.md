---
name: laravel-reverb
description: "Laravel Reverb & WebSockets Broadcasting pour ApiTipTok. À utiliser pour configurer, développer ou déboguer les notifications en direct, événements broadcastés, canaux privés et canaux de présence pour le chat et les mises à jour temps réel."
---

# Laravel Reverb & WebSockets Broadcasting (ApiTipTok)

Guide technique pour les fonctionnalités temps réel, la messagerie et les notifications via Laravel Reverb et Laravel Echo.

## Architecture

1. **Serveur Reverb** : Démarre via `php artisan reverb:start`.
2. **Authentification des Canaux** : Les canaux privés (`private-chat.{id}`) et de présence (`presence-room.{id}`) sont autorisés dans `routes/channels.php`.
3. **Frontend Tiptok (Vue 3)** : Connecté via Laravel Echo et le package `pusher-js`.

## Guides de Référence Locaux

- [Serveur Laravel Reverb](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/reverb.md)
  - Configuration de `config/reverb.php`
  - Variables d'environnement (`REVERB_APP_ID`, `REVERB_APP_KEY`, `REVERB_APP_SECRET`, `REVERB_HOST`, `REVERB_PORT`)
  - Scaling horizontal et drivers Redis
- [Broadcasting & Canaux Laravel](file:///Users/devinsto/Herd/api.tiptok/agents-docs-framework/chat-reverb/broadcasting.md)
  - Définition d'événements implémentant `ShouldBroadcast` ou `ShouldBroadcastNow`
  - Formatage des payloads (`broadcastWith()`)
  - Canaux de présence pour connaître la liste des utilisateurs connectés
