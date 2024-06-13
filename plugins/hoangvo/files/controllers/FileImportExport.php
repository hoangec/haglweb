<?php
namespace Hoangvo\Files\Controllers;

use Backend;
use Backend\Classes\Controller;
use Hoangvo\Files\Models\FileImportModel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileImportExport extends Controller {
    public $implement = [
        \Backend\Behaviors\ImportExportController::class
    ];
    public $importExportConfig = 'config_import_export.yaml';

}
