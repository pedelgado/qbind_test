<?php

namespace Pedro\Qbind\Vat\Domain;

interface VatRepository
{
    public function save(Vat $vat);

    public function findAll();
}