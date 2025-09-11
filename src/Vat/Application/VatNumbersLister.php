<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\Vat;
use Pedro\Qbind\Vat\Domain\VatRepository;

readonly class VatNumbersLister
{
    public function __construct(
        private VatRepository $vatRepository
    ) {}

    public function __invoke(): array
    {
        $vatCollection = $this->vatRepository->findAll();

        return array_map(
            fn (Vat $vat) => [
                "value" => $vat->vatNumber()
            ],
            iterator_to_array($vatCollection)
        );
    }
}