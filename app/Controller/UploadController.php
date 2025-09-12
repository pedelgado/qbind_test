<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\app\util\AlertType;
use Pedro\Qbind\config\twig\TwigService;
use Pedro\Qbind\Vat\Application\VatCreator;
use Pedro\Qbind\VatCsv\Application\VatParser;

final class UploadController extends BaseController
{
    public function __construct(
        private readonly VatParser $vatParser,
        private readonly VatCreator $vatCreator,
        private readonly TwigService $twigService,
    ) {}

    public function __invoke(): void
    {
        if (isset($_FILES['vat_file'])) {

            // Check file format is CSV
            if ($_FILES['vat_file']['type'] !== 'text/csv') {
                $this->addAlert(AlertType::ERROR, "Invalid file format. Please upload a CSV file.");
            } else {
                // Process the uploaded file
                $records = $this->vatParser->__invoke($_FILES['vat_file']['tmp_name']);

                // Create VAT entries
                array_map(fn($record) => $this->vatCreator->__invoke($record['id'], $record['vat_number']), $records);

                // Add a success alert
                $this->addAlert(AlertType::SUCCESS, "File processed successfully");
            }
        }

        $template = $this->twigService->twig()->load('upload-form.html.twig');

        echo $template->render([
            "title" => "Upload VAT Numbers",
            "alert" => $this->alert()?->message(),
            "alertType" => $this->alert()?->type()->name
        ]);
    }
}