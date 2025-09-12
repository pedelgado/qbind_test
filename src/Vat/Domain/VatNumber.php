<?php

namespace Pedro\Qbind\Vat\Domain;

use Pedro\Qbind\Shared\Domain\ValueObject\StringValueObject;
use RuntimeException;

class VatNumber extends StringValueObject
{
    private function __construct(string $vatNumber)
    {
        parent::__construct($vatNumber);
    }

    // Named constructor
    public static function create(string $vatNumber): self
    {
        return new self($vatNumber);
    }

    static public function isValid(string $vatNumber): bool
    {
        $pattern = '/^(IT)?\d{11}$/';

        if (preg_match($pattern, $vatNumber)) {
            return true;
        }

        return false;
    }

    static public function hasPrefix(string $vatNumber): bool
    {
        return preg_match('/^IT/', $vatNumber) === 1;
    }

    static public function isFixable(string $vatNumber): bool
    {
        return self::isValid($vatNumber) && !self::hasPrefix($vatNumber);
    }
}
