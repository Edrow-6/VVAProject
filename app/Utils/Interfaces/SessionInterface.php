<?php

namespace App\Utils\Interfaces;

interface SessionInterface
{
    public function get(string $key);

    public function set(string $key, mixed $value): self;

    public function remove(string $key):void;

    public function clear(): void;

    public function has(string $key): bool;
}
