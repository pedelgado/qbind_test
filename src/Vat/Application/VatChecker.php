<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\VatNumber;

readonly class VatChecker
{

    public function __invoke(string $vatNumber): array
    {
        return [
            'valid' => VatNumber::isValid($vatNumber),
            'fixable' => !VatNumber::hasPrefix($vatNumber),
        ];
    }
}
