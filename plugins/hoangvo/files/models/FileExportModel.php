<?php
namespace Hoangvo\Files\Models;

use Backend\Models\ExportModel;

/**
 * Model
 */
class FileExportModel extends ExportModel
{
    public $rules = [];

    public function exportData($columns, $sessionKey = null)
    {
        $dsFiles = File::all();

        $dsFiles->each(function($file) use ($columns) {
            $file->addVisible($columns);
        });

        return $dsFiles->toArray();
    }
}
