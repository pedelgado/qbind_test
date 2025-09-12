<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\VatNumber;
use RuntimeException;

readonly class VatChecker
{

    public function __invoke(string $vatNumber): array
    {
        // Guard statement
        if (!VatNumber::isValid($vatNumber)) {
            return ['valid' => false, 'fixable' => false];
        }

        $vat = VatNumber::create($vatNumber);

        return [
            'valid' => true,
            'fixable' => !$vat->hasPrefix(),
        ];
    }
}
