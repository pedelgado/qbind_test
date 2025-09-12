<?php

namespace Pedro\Qbind\Vat\Domain;

class Vat
{
    public function __construct(
        private readonly string $id,
        private readonly VatNumber $vatNumber
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function vatNumber(): string
    {
        return $this->vatNumber->value();
    }
}
