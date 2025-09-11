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
        // Guard statement
        if (!self::isValid($vatNumber)) {
            throw new RuntimeException("Invalid VAT number format");
        }

        return new self($vatNumber);
    }

    public static function isValid(string $vatNumber): bool
    {
        $pattern = '/^(IT)?\d{11}$/';

        if (preg_match($pattern, $vatNumber)) {
            return true;
        }

        return false;
    }

    public function hasPrefix(): bool
    {
        return preg_match('/^IT/', $this->value()) === 1;
    }
}
