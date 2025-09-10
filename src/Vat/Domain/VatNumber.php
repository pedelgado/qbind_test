<?php

namespace Pedro\Qbind\Vat\Domain;

use Pedro\Qbind\Shared\Domain\ValueObject\StringValueObject;

class VatNumber extends StringValueObject
{
    public function isValid(): bool
    {
        $pattern = '/^(IT)?\d{11}$/';

        if (preg_match($pattern, $this->value())) {
            return true;
        }

        return false;
    }

    public function hasPrefix(): bool
    {
        return preg_match('/^IT/', $this->value()) === 1;
    }
}
