<?php

namespace App\Utils;

use App\Utils\Interfaces\SessionInterface;
<<<<<<< HEAD
=======
use JetBrains\PhpStorm\Pure;
>>>>>>> dev

class SessionManager implements SessionInterface
{
    public function __construct(?string $cacheExpire = null, ?string $cacheLimiter = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            if ($cacheExpire !== null) {
                session_cache_expire($cacheExpire);
            }
            if ($cacheLimiter !== null) {
                session_cache_limiter($cacheLimiter);
            }

            session_start();
        }
    }

<<<<<<< HEAD
    public function get(string $key)
=======
    #[Pure] public function get(string $key)
>>>>>>> dev
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public function set(string $key, mixed $value): SessionManager
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function remove(string $key): void
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear(): void
    {
        session_unset();
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
}