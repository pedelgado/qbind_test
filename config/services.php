<?php

use Pedro\Qbind\Vat\Domain\VatRepository;

$container = new League\Container\Container();

// Use case services
$container->add(\Pedro\Qbind\Vat\Application\VatCreator::class)
    ->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);

$container->add(\Pedro\Qbind\Vat\Application\VatLister::class)
    ->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);

$container->add(\Pedro\Qbind\Vat\Application\VatChecker::class);

// Domain services
$container->add(\Pedro\Qbind\Vat\Domain\VatRepository::class, \Pedro\Qbind\Vat\Infrastructure\SQLiteVatRepository::class);

// Controller services
$container->add(\Pedro\Qbind\app\Controller\HomeController::class)
    ->addArgument(\Pedro\Qbind\Vat\Application\VatLister::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

$container->add(\Pedro\Qbind\app\Controller\UploadController::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

$container->add(\Pedro\Qbind\app\Controller\CheckController::class)
    ->addArgument(\Pedro\Qbind\Vat\Application\VatChecker::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

// Config class services
$container->add(\Pedro\Qbind\config\twig\TwigService::class);

return $container;
