<?php

namespace Pedro\Qbind\Vat\Infrastructure;

use Pedro\Qbind\Vat\Domain\Vat;
use Pedro\Qbind\Vat\Domain\VatCollection;
use Pedro\Qbind\Vat\Domain\VatNumber;
use Pedro\Qbind\Vat\Domain\VatRepository;

class InMemoryVatRepository implements VatRepository
{
    private array $vat_items = [];

    public function __construct()
    {
        $this->vat_items = [
            new Vat(
                new VatNumber("test")
            )
        ];
    }

    public function save(Vat $vat): void
    {
        $this->vat_items[] = $vat;
    }

    public function findByVatNumber(string $vatNumber): ?Vat
    {
        $results = array_filter($this->vat_items, fn($vat) => $vat->getVatNumber() === $vatNumber);
        return !empty($results) ? reset($results) : null;
    }

    public function findAll(): VatCollection
    {
        return new VatCollection($this->vat_items);
    }
}
