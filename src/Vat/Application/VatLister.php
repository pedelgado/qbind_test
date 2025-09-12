<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\Vat;
use Pedro\Qbind\Vat\Domain\VatNumber;
use Pedro\Qbind\Vat\Domain\VatRepository;

readonly class VatLister
{
    public function __construct(
        private VatRepository $vatRepository
    ) {}

    public function __invoke(): array
    {
        $vatCollection = $this->vatRepository->findAll();

        return array_map(
            fn (Vat $vat) => [
                "original" => $vat->vatNumber(),
                "valid" => VatNumber::isValid($vat->vatNumber()),
                "fixable" => VatNumber::isFixable($vat->vatNumber()),
            ],
            iterator_to_array($vatCollection)
        );
    }
}