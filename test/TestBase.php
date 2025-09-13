<?php

namespace Pedro\Qbind\Test;

use League\Container\Container;
use PHPUnit\Framework\TestCase;

class TestBase  extends TestCase
{
    private Container $DiContainer;

    public function diContainer()
    {
        return $this->DiContainer;
    }

    public function setUp(): void
    {
        $this->DiContainer = require __DIR__ . '/../config/services.php';
    }
}
