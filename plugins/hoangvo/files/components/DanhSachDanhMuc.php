<?php
namespace Hoangvo\Files\Components;

use Cms\Classes\ComponentBase;
use Hoangvo\Files\Models\DanhMuc;

/**
 * DanhSachDanhMuc Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class DanhSachDanhMuc extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'DanhSachDanhMuc',
            'description' => 'Hiện thị danh sach các danh mục'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'danhMuc' => [
                'title' => 'Chọn danh mục',
                'description' => 'Chọn danh mục hiển thị files',
                'type' => 'dropdown',

            ]
        ];
    }

    protected function loadDsDanhMuc()
    {
        $query = DanhMuc::all();
        $query = $query->sortByDesc('thu_tu');
        return $query;
    }

    public function dsDanhMuc()
    {
        return $this->loadDsDanhMuc();
    }
}
