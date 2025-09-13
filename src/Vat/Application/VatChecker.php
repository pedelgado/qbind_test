<?php

namespace Pedro\Qbind\Vat\Application;

use Pedro\Qbind\Vat\Domain\VatNumber;

readonly class VatChecker
{

    public function __invoke(string $vatNumber): array
    {
        $valid = VatNumber::isValid($vatNumber);
        $hasPrefix = VatNumber::hasPrefix($vatNumber);

        return [
            'valid' => $valid,
            'fixable' => $valid && !$hasPrefix,
        ];
    }
}
