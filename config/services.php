<?php

$container = new League\Container\Container();

// Src
$container->add(\Pedro\Qbind\Vat\Application\VatCreator::class)
    ->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);
$container->add(\Pedro\Qbind\Vat\Application\VatLister::class)
    ->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);
$container->add(\Pedro\Qbind\Vat\Domain\VatRepository::class, \Pedro\Qbind\Vat\Infrastructure\SQLiteVatRepository::class);

// Controllers
$container->add(\Pedro\Qbind\app\Controller\HomeController::class)
    ->addArgument(\Pedro\Qbind\Vat\Application\VatLister::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

$container->add(\Pedro\Qbind\app\Controller\UploadController::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

$container->add(\Pedro\Qbind\app\Controller\AddController::class)
    ->addArgument(\Pedro\Qbind\Vat\Application\VatCreator::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

// Config classes
$container->add(\Pedro\Qbind\config\twig\TwigService::class);

return $container;
