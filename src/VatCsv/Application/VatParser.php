<?php

namespace Pedro\Qbind\VatCsv\Application;

use Pedro\Qbind\VatCsv\Domain\CsvParser;

class VatParser
{
    public function __construct(
        private readonly CsvParser $csvParser
    ) {}

    public function __invoke(string $csvPath): array {
        return $this->csvParser->parse($csvPath);
    }
}