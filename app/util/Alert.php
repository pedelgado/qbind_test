<?php

namespace Pedro\Qbind\app\util;

class Alert
{
    public function __construct(
        private readonly AlertType $type,
        private readonly string $message,
    ){}

    public function message(): string
    {
        return $this->message;
    }

    public function type(): AlertType
    {
        return $this->type;
    }
}