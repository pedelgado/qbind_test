<?php

namespace Pedro\Qbind\config\twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/../../app/Views');
        $this->twig = new Environment($this->loader, [
            'cache' => __DIR__ . '/../../cache/twig',
        ]);
    }

    public function twig(): Environment
    {
        return $this->twig;
    }
}