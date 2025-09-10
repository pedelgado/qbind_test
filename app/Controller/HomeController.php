<?php

namespace Pedro\Qbind\app\Controller;

class HomeController
{
    public function __invoke(): void
    {
        echo "Home page";
    }
}