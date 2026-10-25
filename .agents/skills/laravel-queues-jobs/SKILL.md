---
name: laravel-queues-jobs
description: >-
  12 golden rules and production best practices for Laravel 13 background jobs,
  queues, and Horizon. Use when designing, dispatching, or debugging queued jobs,
  listeners, notifications, retries, backoff, ShouldBeUnique, and after_commit.
---

# Laravel 13 Background Jobs & Queues (Production Standards)

Authoritative reference for queued jobs, listeners, and workers under Laravel 13 & Horizon 5.x.

---

## 12 Golden Rules for Production

### 1. Keep Arguments Small (Light Payloads)
- **Do not** pass large Eloquent collections or heavy binary data into the constructor.
- Pass model IDs (`int`, `string`, `Uuid`) or lightweight primitives.
- Let Laravel re-fetch the model from the database (`SerializesModels`) in `handle()` so it works on fresh data.

### 2. Explicit Queue Naming & Priority
- Always assign a specific queue:
  - `high`: SMS Twilio, 2FA, OTP, critical alerts, real-time webhooks.
  - `default`: standard emails, database in-app notifications.
  - `media`: image processing, thumbnail creation, video conversions.
  - `translations`: external AI translation calls.
  - `campaigns`: mass notifications and bulk marketing.
- **For Jobs / Notifications (`use Queueable`)**: Call `$this->onQueue('high')` in `__construct()`. **NEVER** declare `public string $queue` as a class property (fatal collision with `Queueable::$queue`).
- **For Listeners (`use InteractsWithQueue`)**: Declare `public string $queue = 'high';`.

### 3. Strict Idempotence (At-Least-Once Delivery)
- Assume every job runs **at least twice** (workers killed mid-execution, network hiccups).
- Use `updateOrCreate`, `firstOrCreate`, atomic flags (`sms_notified`, `processed_at`), or Redis locks (`Cache::lock('job-key', 60)->block(...)`).

### 4. Keep Jobs Atomic and Short
- Prefer 1 job per record (e.g., dispatch 1,000 small jobs for 1,000 users) rather than 1 monolithic job iterating over 10,000 records.
- If one record fails, only that single job retries without re-executing successfully processed records.

### 5. Declarative Retries & Backoff
- Never swallow exceptions with a silent `catch`.
- Declare retries and exponential backoff:
  ```php
  public int $tries = 3;

  public function backoff(): array
  {
      return [10, 30, 90];
  }
  ```

### 6. Always Dispatch After Database Commit (`after_commit`)
- Ensure `'after_commit' => true` is enabled in `config/queue.php`.
- Alternatively, use `dispatch()->afterCommit()` to ensure jobs are never picked up by a worker before the database transaction commits.

### 7. Contract `ShouldBeUnique`
- When implementing `ShouldBeUnique`:
  - **Always define** `public int $uniqueFor = 300;` (prevents permanent orphaned locks if a worker dies).
  - **Always define** `public function uniqueId(): string` returning a deterministic business key (e.g., `(string) $this->reservationId`).

### 8. Batch Cancellation Awareness
- When using `Batchable`, always check `$this->batch()->cancelled()` at the start of `handle()`:
  ```php
  if ($this->batch()?->cancelled()) {
      return;
  }
  ```

### 9. Never `sleep()` Inside a Job
- A `sleep()` locks the worker process, consumes concurrency slots, and delays other jobs.
- Use `release(int $seconds)` instead to return the job to the queue and free the worker.

### 10. Deployment Compatibility & PHP `unserialize`
- Because `unserialize()` does **not** call `__construct()`, always declare all class properties with explicit default values at the class level:
  ```php
  public bool $force = false;
  ```
- Never rely solely on constructor property promotion without class-level defaults.

### 11. Supervise Workers & Monitor
- In production, monitor queues via Laravel Horizon.
- Always configure timeout: `public int $timeout = 120;`.
