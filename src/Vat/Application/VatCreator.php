<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\Vat;
use Pedro\Qbind\Vat\Domain\VatNumber;
use Pedro\Qbind\Vat\Domain\VatRepository;

readonly class VatCreator
{
    public function __construct(
        private VatRepository $vatRepository
    ) {}

    public function __invoke(string $id, string $vatNumber): void
    {
        $vatNumber = VatNumber::create($vatNumber);
        $vat = new Vat($id, $vatNumber);
        $this->vatRepository->save($vat);
    }
}
