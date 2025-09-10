<?php

namespace Pedro\Qbind\Vat\Domain;

class Vat
{
    public function __construct(
        private readonly VatNumber $vatNumber
    ) {}

    public function vatNumber(): string
    {
        return $this->vatNumber->value();
    }
}
