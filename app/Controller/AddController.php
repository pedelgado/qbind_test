<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\config\twig\TwigService;
use Pedro\Qbind\Vat\Application\VatCreator;

class AddController
{
    public function __construct(
        private readonly VatCreator  $vatCreator,
        private readonly TwigService $twigService,
    ) {}

    public function __invoke(): void
    {
        // Check if post
        if (isset($_POST["vat_number"])) {
            $this->vatCreator->__invoke($_POST["vat_number"]);
        }

        // Render template
        $template = $this->twigService->twig()->load('add-form.html.twig');
        echo $template->render([
            "title" => "Add VAT Number",
        ]);
    }
}