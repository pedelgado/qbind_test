<?php

namespace Pedro\Qbind\Test\Vat\Application;

use Pedro\Qbind\Test\TestBase;
use Pedro\Qbind\Vat\Application\VatChecker;
use Pedro\Qbind\Vat\Domain\VatNumber;

class VatCheckerTest extends TestBase
{
    private VatChecker $vatChecker;

    public function setUp(): void
    {
        parent::setUp();
        $this->vatChecker = $this->diContainer()->get(VatChecker::class);
    }

    public function testValidVatNumber()
    {
        // Arrange
        $vatNumber = "IT12345678901";
        $expectedResult = [
            "valid" => true,
            "fixable" => false
        ];

        // Act
        $checkerResult = $this->vatChecker->__invoke($vatNumber);

        // Assert
        $this->assertEquals($expectedResult, $checkerResult);
    }

    public function testNonValidVatNumber()
    {
        // Arrange
        $vatNumber = "vat12345678901";
        $expectedResult = [
            "valid" => false,
            "fixable" => false
        ];

        // Act
        $checkerResult = $this->vatChecker->__invoke($vatNumber);

        // Assert
        $this->assertEquals($expectedResult, $checkerResult);
    }

    public function testFixableVatNumber()
    {
        // Arrange
        $vatNumber = "12345678901";
        $expectedResult = [
            "valid" => true,
            "fixable" => true
        ];

        // Act
        $checkerResult = $this->vatChecker->__invoke($vatNumber);

        // Assert
        $this->assertEquals($expectedResult, $checkerResult);
    }
}