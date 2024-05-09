<?php
namespace Hoangvo\Files\Components;

use Cms\Classes\ComponentBase;
use Hoangvo\Files\Models\File;

/**
 * DanhSachFile Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class DanhSachFile extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'DanhSachFile Component',
            'description' => 'Hiển thị danh sách file'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'sortOrder' => [
                'title' => 'Sắp xếp files',
                'description' => 'Sắp xếp dữ liệu theo thứ tự tăng giảm',
                'type' => 'dropdown',

            ],
            'soLuong' => [
                'title' => 'Số lượng files',
                'description' => 'Số lượng file được hiển thị',
                'type' => 'string',
                'default' => 10,
                'validation' => [
                    'integer' => [
                        'message' => 'Kiểu dữ liệu phải là số nguyên không âm',
                        'allowNegative' => false,
                        'min' => [
                            'value' => 1,
                            'message' => 'Số lượng ít nhất là 1.'
                        ],
                    ]
                ]
            ],

        ];
    }

    public function getSortOrderOptions()
    {
        return [
            'nam_du_lieu_asc' => 'Năm tăng dần',
            'nam_du_lieu_desc' => 'Năm giảm dần'
        ];
    }

    public function onRun()
    {

        // $this->property('sortOrder', 'nam_du_lieu_desc');
        // dd($this->property('sortOrder'));
    }

    protected function loadDsFiles()
    {
        $query = File::all();
        if ($this->property('sortOrder') == 'nam_du_lieu_asc') {

            $query = $query->sortBy('nam_du_lieu');
        }
        if ($this->property('sortOrder') == 'nam_du_lieu_desc') {
            $query = $query->sortByDesc('nam_du_lieu');
        }
        if ($this->property('soLuong')) {

            $query = $query->sortByDesc('ngay_dang')->take($this->property('soLuong'));
        }
        return $query;
    }

    public function files()
    {
        return $this->loadDsFiles();
    }


}
