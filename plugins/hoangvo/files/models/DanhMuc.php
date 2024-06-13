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

    public $implement = [
        \RainLab\Translate\Behaviors\TranslatableModel::class
    ];

    public $translatable = ['ten'];
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
        } elseif ($this->loai_danh_muc == 'ptbv') {
                return 'Báo cáo phát triển bền vững';
        }
        elseif ($this->loai_danh_muc == 'bcks') {
            return 'Báo cáo kiểm soát';
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

    public function getAllFilesTheoQuy() {
        // dd($this->files->groupBy('ten'));
        // $dsFiles = new \October\Rain\Database\Collection();
        // if($this->ds_danh_muc_con != null){
        //     foreach($this->ds_danh_muc_con as $danhMucCon) {
        //         foreach($danhMucCon->files as $file){

        //             $dsFiles->push($file);
        //         }
        //     }
        // }
        // foreach($this->files as $file){
        //     $dsFiles->push($file);
        // }
           // Nhóm các File theo 'nam_du_lieu' trước
        $groupedByYear = $this->files->groupBy('nam_du_lieu');
        // Nhóm tiếp theo 'ten' trong mỗi nhóm 'nam_du_lieu'
        $groupedFiles = $groupedByYear->map(function ($items) {
            return $items->groupBy('ten');
        });
        // Trả về kết quả (có thể là mảng hoặc đối tượng JSON)
        return $groupedFiles;

    }

}
