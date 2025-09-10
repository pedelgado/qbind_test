<?php

namespace Pedro\Qbind\Vat\Domain;

use Pedro\Qbind\Shared\Domain\Collection;

class VatCollection extends Collection
{
    protected function type(): string
    {
        return Vat::class;
    }
}
