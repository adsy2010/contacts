<?php

declare(strict_types=1);

namespace Src\DTO;


interface MessageInterface
{
    public function setMessage(string $message): void;

    public function getMessage(): string;

    public function hasMessage(): bool;
}
