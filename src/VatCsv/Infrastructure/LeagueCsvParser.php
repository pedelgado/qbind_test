<?php

namespace Pedro\Qbind\VatCsv\Infrastructure;

use League\Csv\Reader;
use Pedro\Qbind\VatCsv\Domain\CsvParser;

class LeagueCsvParser implements CsvParser
{
    public function parse(string $csvPath): array
    {
        // Load the CSV document from a file path
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        // Get all the records as an Iterator object
        $records = $csv->getRecords(); // an Iterator object containing arrays

        // Convert the Iterator to an array
        return array_map(
            fn ($record) => $record,
            iterator_to_array($records)
        );
    }
}
