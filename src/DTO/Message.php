<?php

declare(strict_types=1);

namespace Src\DTO;

final class Message implements MessageInterface
{
    private string $message;

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function hasMessage(): bool
    {
        return isset($this->message);
    }
}
