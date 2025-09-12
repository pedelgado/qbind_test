<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\config\twig\TwigService;

final class UploadController extends BaseController
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