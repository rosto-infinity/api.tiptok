# ApiTipTok Workspace Coding Guidelines & Architecture Rules

This document consolidates key technical standards and best practices for developing and debugging features in the ApiTipTok stack (Laravel 13 API + Vue 3 + Tailwind CSS v4).

---

## 1. Frontend Standards (Vue 3 + Vite + Tailwind CSS v4 + Pinia)

### A. Architecture & Components
*   **Vue 3 Composition API**: Always use `<script setup lang="ts">` (or `<script setup>`).
*   **Tailwind CSS v4**: CSS-first configuration via `@import "tailwindcss";` and `@theme` in `resources/css/app.css`.
*   **State Management**: Use Pinia stores for global application state with clear action/getter separation.
*   **API Client**: Use a central Axios or Fetch client configured with Sanctum CSRF / Bearer token authentication and base URL pointing to `/api`.

### B. Button Cursor & Styling Reset
*   Always ensure pointers are restored for clickable buttons:
    ```css
    @layer base {
      button:not(:disabled),
      [role="button"]:not(:disabled) {
        cursor: pointer;
      }
    }
    ```

### C. Component Reactivity & Performance
*   **Reactivity Rules**: Avoid destructuring reactive props without `toRefs` or Vue 3.5+ reactive props destructuring. Always use getter functions for watching props: `watch(() => props.item, ...)`.
*   **Form Validation**: Use standard form validation (e.g. VeeValidate or reactive error mapping matching Laravel validation errors).
*   **Key Stability**: Always use stable unique keys on `v-for` loops (e.g. `:key="item.id"`), never pure array indices for items that can reorder.

---

## 2. Backend Standards (Laravel 13 + Spatie Permissions + GeniusPay)

### A. API Bootstrapping & Exception Handling
*   **No Redirects on Unauthenticated API Calls**: Ensure unauthenticated requests to `api/*` return a `401 Unauthorized` JSON response.
*   **Middleware Configuration (`bootstrap/app.php`)**:
    ```php
    $middleware->redirectTo(
        guests: fn ($request) => $request->is('api/*') ? null : '/auth/login'
    );
    ```
    And render `AuthenticationException` as JSON:
    ```php
    $exceptions->render(fn (AuthenticationException $e, Request $request) => 
        $request->is('api/*') ? response()->json(['message' => 'Unauthenticated.'], 401) : null
    );
    ```

### B. Roles and Permissions (Spatie)
*   **Always Check Permissions, Not Roles**: Users have roles, roles have permissions. Check granular permissions (e.g. `$user->can('view-listings')` or `@can('view-listings')`) instead of checking `$user->hasRole('admin')`.
*   **Enums for Roles & Permissions**: Use `BackedEnum` for roles and permissions. Pass the enum cases directly to package methods (e.g., `$user->assignRole(RolesEnum::WRITER)`). Use `enum_value()` or `->value` when raw string serialization is needed.

### C. GeniusPay Integration
*   **Merchant API Base URL**: `https://pay.genius.ci/api/v1/merchant`
*   **Authentication**: Headers must include `X-API-Key` and `X-API-Secret`. Keep secret keys strictly on the server-side.
*   **Webhook Signature Verification**: Verify all incoming webhook notifications using HMAC-SHA256 signature calculated as:
    `HMAC-SHA256(timestamp + "." + raw_payload, webhook_secret)`
    Reject requests with invalid signatures or timestamps older than 5 minutes.

### D. Cache & Memory Flushing (Native Laravel Herd)
*   Clear application, config, route, and view caches using Artisan directly:
    ```bash
    php artisan optimize:clear
    ```

### E. Events, Listeners & Notifications (Laravel Auto-Discovery)
*   **Do Not Re-register Auto-Discovered Listeners**: Laravel 11/12/13 automatically discovers and registers any Listener in `app/Listeners/` (and its subdirectories like `app/Listeners/Admin/`) if its `handle()` method has a typehinted event parameter (e.g. `handle(UserRegistered $event)`). Never register them manually with `Event::listen()` in `AppServiceProvider` or elsewhere, otherwise the listeners will execute twice, resulting in duplicate emails and multiple in-app notifications.
*   **Delete Obsolete Listener Files**: Because auto-discovery scans the entire directory, leaving obsolete listener classes on disk will cause them to be executed automatically.
*   **Model Booted Hooks vs Controllers**: If a model hook (e.g., `Reservation::booted()` on `status === 'completed'`) already dispatches an event (like `ReservationPaid`), do not dispatch it again in controllers/webhooks.

*   **Explicit Queue Naming**: Assign explicit queues matching standard priorities: `high` (SMS Twilio, verification, critical alerts), `default` (standard notifications/emails), `media` (image processing), `translations` (external AI translation), `campaigns` (mass marketing).
    *   **For Listeners (`use InteractsWithQueue`)**: Declare `public string $queue = '...';`.
    *   **For Jobs, Mails & Notifications (`use Queueable`)**: NEVER declare `public string $queue` as a class property (PHP fatal collision with `Queueable::$queue`). Always call `$this->onQueue('...')` inside `__construct()`.
*   **Always Enable `after_commit`**: Keep `'after_commit' => true` in `config/queue.php` to ensure jobs are never dispatched before database transactions commit.
*   **Strict Idempotence**: Assume every job runs at least twice. Use `firstOrCreate`, `updateOrCreate`, atomic flags (`sms_notified`, `email_notified`), or Cache locks (`Cache::put()`) with TTL.
*   **Declarative Retries & Backoff**: Never swallow exceptions in a queued job or listener with a silent `catch`. Always declare `public int $tries` and a `public function backoff(): array` (e.g., `[10, 30, 90]`).
*   **`ShouldBeUnique` Contract**: When using `ShouldBeUnique`, ALWAYS define `public int $uniqueFor` (TTL to avoid permanent orphan locks) AND `public function uniqueId(): string`.
*   **Deployment Compatibility (PHP `unserialize`)**: Because `unserialize()` does not call `__construct()`, always declare class properties and their default values at the class level (e.g., `public bool $force = false;`), never solely as promoted constructor arguments.

### F. Environment & Native Architecture Rules (No Docker)
*   **No Docker / No FrankenPHP**: This project runs 100% natively on macOS via Laravel Herd (PHP 8.5) and local MySQL/Redis/Node.js services. Do not use or configure Docker, Docker Compose, or FrankenPHP.
*   **API & Frontend Decoupling**:
    *   Backend API is `api.tiptok` (`/Users/devinsto/Herd/api.tiptok`), serving pure JSON endpoints under `/api`.
    *   Frontend application is `tiptok` (Vue 3 + Vite + Tailwind CSS v4 + Pinia).
*   **CORS & Sanctum Statefulness**: Configure `config/cors.php` and `config/sanctum.php` stateful domains to allow requests from the `tiptok` frontend.

---

## 3. Agent Harness & Workflows (ECC for Antigravity)

The `.agents/` directory is equipped with the ECC (Everything Claude Code / Antigravity Harness) operating system natively configured for Antigravity 2.0.

### A. Modular Rules (`.agents/rules/`)
*   **Common Standards**: `common-coding-style.md`, `common-security.md`, `common-testing.md`, `common-performance.md`, `common-code-review.md`.
*   **Backend (PHP / Laravel)**: `php-coding-style.md`, `php-security.md`, `php-patterns.md`, `php-testing.md`.
*   **Frontend (TypeScript / Vue / Tailwind)**: `typescript-coding-style.md`, `typescript-security.md`, `typescript-patterns.md`, `typescript-testing.md`.

### B. Specialized Agents (`.agents/agents/`)
*   `php-reviewer`: Audits Laravel / PHP code for PSR-12, Eloquent anti-patterns, SQL injection, and authorization.
*   `vue-reviewer`: Reviews Vue 3 composition components, reactivity safety, and performance.
*   `typescript-reviewer`: Enforces strict TypeScript typing, avoiding `any`, and ensuring type-safe DTOs.
*   `architect` & `code-architect`: System design, module breakdown, and scalability reviews.
*   `security-reviewer`: Threat modeling, authentication vulnerabilities, and data sanitization.
*   `tdd-guide`: Guides test-driven development (red-green-refactor) cycles.

### C. Available Workflows (`.agents/workflows/`)
*   `/plan`: Structured step-by-step implementation planning.
*   `/code-review`: Comprehensive multi-stage code review.
*   `/security-scan`: Full codebase security and vulnerability audit.
*   `/build-fix`: Automated diagnostic and repair of build and runtime errors.
*   `/refactor-clean`: Clean up obsolete code, dead paths, and enforce clean architecture.

### D. Specialized Skills (`.agents/skills/`)
*   **Laravel Core**:
    *   `laravel-patterns`: Routing, controllers, thin services/actions, Eloquent, API resources, cache.
    *   `laravel-security`: Production auth (Sanctum), mass-assignment protection, HTTPS, policies.
    *   `laravel-tdd`: Test-driven development with Pest/PHPUnit, factories, HTTP feature tests.
    *   `laravel-verification`: Verification pipeline (lint Pint, PHPStan, audit, migrations, cache).
    *   `laravel-plugin-discovery`: Search and evaluate packages with LaraPlugins MCP.
    *   `laravel-queues-jobs`: 12 golden rules for production queues, retries, idempotence, `after_commit`.
*   **Vue 3 & Frontend**:
    *   `vue-patterns`: Composition API, reactivity, state store design, component boundaries.
    *   `ui-to-vue`: Batch conversion and adaptation of UI designs into Vue 3 components.
    *   `tailwindcss-development`: Tailwind CSS v4 development, utility classes, and design tokens.
*   **Frontend Design & UX**:
    *   `frontend-design-direction`: Design system moderne, esthétique premium, tokens sémantiques.
    *   `design-system`: Cohérence des composants, tokens de thème, typographie et palettes.
    *   `frontend-patterns`: Architecture frontend, performance de rendu, gestion d'état.
    *   `frontend-a11y`: Accessibilité web, navigation clavier, contrastes, balises ARIA.
    *   `dashboard-builder`: Conception de tableaux de bord opérationnels et analytiques.




