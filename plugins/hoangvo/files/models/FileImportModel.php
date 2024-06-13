<?php
namespace Hoangvo\Files\Models;

use Backend\Models\ImportModel;
use Exception;
use Storage;

/**
 * Model
 */
class FileImportModel extends ImportModel
{
    public $rules = [];

    protected $errors = [];
    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            $fileAttachPath = $data["attach_file"];
            try {
                $fileAttachExists = $this->checkFileTonTai($fileAttachPath);
                if ($fileAttachExists) {
                    $file = new File();
                    $file->fill($data);
                    $file->save();
                    $this->logCreated();
                } else {
                    $this->logError($row, "Quá trinh import File cổ đông tiếng việt bị lỗi đường dẫn file không tồn tại: " . $fileAttachPath);
                }
            } catch (Exception $ex) {
                $this->logError($row, 'Quá trinh import File cổ đông bị lỗi ngoại lệ: ' . $ex->getMessage());
            }

        }
    }

    private function checkFileTonTai($filePath)
    {
        return Storage::disk('media')->exists($filePath);
    }


}
