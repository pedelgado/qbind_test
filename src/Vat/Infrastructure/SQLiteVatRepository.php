<?php

namespace Pedro\Qbind\Vat\Infrastructure;

use PDO;
use Pedro\Qbind\Vat\Domain\Vat;
use Pedro\Qbind\Vat\Domain\VatCollection;
use Pedro\Qbind\Vat\Domain\VatNumber;
use Pedro\Qbind\Vat\Domain\VatRepository;

class SQLiteVatRepository implements VatRepository
{
    private PDO $pdo;

    public function __construct(string $dbFile = "vat.sqlite") {
        $this->pdo = new PDO("sqlite:" . $dbFile);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if it doesn’t exist
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS vat (
                id TEXT PRIMARY KEY,
                vat_number TEXT NOT NULL
            )
        ");
    }

    public function save(Vat $vat): void {
        $stmt = $this->pdo->prepare("
            INSERT INTO vat (id, vat_number)
            VALUES (:id, :vat_number)
            ON CONFLICT(id) DO UPDATE SET
                vat_number = excluded.vat_number
        ");
        $stmt->execute([
            ':id' => $vat->id(),
            ':vat_number' => $vat->vatNumber()
        ]);
    }

    public function findAll(): VatCollection {
        $stmt = $this->pdo->query("SELECT * FROM vat");
        $vats = [];

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $vatId = $row['id'];
            $vatNumber = VatNumber::create($row['vat_number']);
            $vats[] = new Vat($vatId, $vatNumber);
        }

        return new VatCollection($vats);
    }
}
