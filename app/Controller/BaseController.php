<?php

namespace Pedro\Qbind\app\Controller;

use Pedro\Qbind\app\util\Alert;
use Pedro\Qbind\app\util\AlertType;

abstract class BaseController
{
    private Alert $alert;

    public function addAlert(AlertType $type, string $message): void
    {
        $this->alert = new Alert($type, $message);
    }

    public function alert(): ?Alert
    {
        return $this->alert ?? null;
    }
}
