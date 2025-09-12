<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\config\twig\TwigService;
use Pedro\Qbind\Vat\Application\VatLister;

final class HomeController extends BaseController
{
    public function __construct(
        private readonly VatLister   $vatNumbersLister,
        private readonly TwigService $twigService,
    ) {}

    public function __invoke(): void
    {
        $template = $this->twigService->twig()->load('list.html.twig');
        echo $template->render([
            "title" => "VAT List",
            "content" => "",
            "items" => $this->vatNumbersLister->__invoke(),
        ]);
    }
}