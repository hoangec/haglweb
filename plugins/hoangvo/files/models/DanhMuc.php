<?php
namespace Hoangvo\Files\Models;

use Illuminate\Support\Collection;
use Model;

/**
 * Model
 */

class DanhMuc extends Model
{
    const SORT_ORDER = 'thu_tu';
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'hoangvo_files_danh_muc';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    public $belongsTo = [
        "danh_muc_cha" => DanhMuc::class,
    ];
    public $hasMany = [
        'files' => File::class,
        'ds_danh_muc_con' => [
            DanhMuc::class,
            'key' => 'danh_muc_cha_id'
        ]
    ];

    public function getStatusLabelAttribute()
    {
        if ($this->loai_danh_muc == 'nam') {
            return 'Quản lý theo năm';
        } elseif ($this->loai_danh_muc == 'quy') {
            return 'Quản lý theo quý';
        } elseif ($this->loai_danh_muc == 'nam-catalog') {
                return 'Quản lý theo năm, hiên thị kiểu danh mục';
        } else {
            return 'Chưa chọn loại danh mục';
        }
    }

    public function getAllFiles(){
        $dsFiles = new \October\Rain\Database\Collection();
        if($this->ds_danh_muc_con != null){
            foreach($this->ds_danh_muc_con as $danhMucCon) {
                foreach($danhMucCon->files as $file){
                    $dsFiles->push($file);
                }
            }
        }
        foreach($this->files as $file){
            $dsFiles->push($file);
        }
        return $dsFiles;
    }


}
