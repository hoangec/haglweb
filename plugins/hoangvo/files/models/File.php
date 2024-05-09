<?php namespace Hoangvo\Files\Models;

use Model;
use System\Models\File as SystemFile;
/**
 * Model
 */
class File extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'hoangvo_files_file';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        "file" => "required",
        "ten" => "required",
    ];

    public $attachOne = [
        "file" => SystemFile::class,
        "file2" => SystemFile::class,
    ];

    public $belongsTo = [
        'danh_muc' => DanhMuc::class
    ];

    function getDanhMucIdOptions() {
        return DanhMuc::pluck('ten','id');
    }



}
