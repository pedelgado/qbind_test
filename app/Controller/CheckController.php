<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\app\util\AlertType;
use Pedro\Qbind\config\twig\TwigService;
use Pedro\Qbind\Vat\Application\VatChecker;
use RuntimeException;

final class CheckController extends BaseController
{
    public function __construct(
        private readonly VatChecker  $vatChecker,
        private readonly TwigService $twigService,
    ) {}

    public function __invoke(): void
    {
        // Check if post
        if (isset($_POST["vat_number"])) {
            $result = $this->vatChecker->__invoke($_POST["vat_number"]);

            // Set alert message based on result
            if (!$result["valid"]) {
                $this->addAlert(AlertType::ERROR, "VAT number is NOT valid.");
            } elseif ($result["fixable"]) {
                $this->addAlert(AlertType::WARNING, "VAT number is NOT valid but FIXABLE.");
            } else {
                $this->addAlert(AlertType::SUCCESS, "VAT number is valid.");
            }
        }

        // Render template
        $template = $this->twigService->twig()->load('check-form.html.twig');
        echo $template->render([
            "title" => "VAT Number Checker",
            "value" => $_POST["vat_number"] ?? "",
            "alert" => $this->alert()?->message(),
            "alertType" => $this->alert()?->type()->name
        ]);
    }
}