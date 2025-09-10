<?php

namespace Pedro\Qbind\Vat\Domain;

interface VatRepository
{
    public function findByVatNumber(string $vatNumber);

    public function findAll();
}