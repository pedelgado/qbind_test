<?php

$container = new League\Container\Container();

$container->add(\Pedro\Qbind\app\Controller\HomeController::class)->addArgument(\Pedro\Qbind\Vat\Application\VatNumbersLister::class);
$container->add(\Pedro\Qbind\Vat\Application\VatNumbersLister::class)->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);
$container->add(\Pedro\Qbind\Vat\Domain\VatRepository::class, \Pedro\Qbind\Vat\Infrastructure\InMemoryVatRepository::class);

return $container;