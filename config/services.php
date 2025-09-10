<?php

$container = new League\Container\Container();

// Controllers
$container->add(\Pedro\Qbind\app\Controller\HomeController::class)
    ->addArgument(\Pedro\Qbind\Vat\Application\VatNumbersLister::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

$container->add(\Pedro\Qbind\app\Controller\UploadController::class)
    ->addArgument(\Pedro\Qbind\config\twig\TwigService::class);

// Services
$container->add(\Pedro\Qbind\config\twig\TwigService::class);

// Src
$container->add(\Pedro\Qbind\Vat\Application\VatNumbersLister::class)->addArgument(\Pedro\Qbind\Vat\Domain\VatRepository::class);
$container->add(\Pedro\Qbind\Vat\Domain\VatRepository::class, \Pedro\Qbind\Vat\Infrastructure\InMemoryVatRepository::class);

return $container;