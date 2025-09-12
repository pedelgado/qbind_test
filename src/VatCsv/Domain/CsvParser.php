<?php

namespace Pedro\Qbind\VatCsv\Domain;

interface CsvParser
{
    public function parse(string $csvPath): array;
}