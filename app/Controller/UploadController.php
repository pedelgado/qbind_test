<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\config\twig\TwigService;

class UploadController
{
    public function __construct(
        private readonly TwigService $twigService,
    ) {}

    public function __invoke(): void
    {
        $template = $this->twigService->twig()->load('upload-form.html.twig');
        echo $template->render([
            "title" => "Upload VAT Numbers",
        ]);
    }
}