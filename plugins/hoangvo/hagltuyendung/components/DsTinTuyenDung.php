<?php namespace Hoangvo\Hagltuyendung\Components;

use Cms\Classes\ComponentBase;
use Hoangvo\HaglTuyenDung\Models\TinTuyenDung;

/**
 * DsTinTuyenDung Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class DsTinTuyenDung extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'DsTinTuyenDung Component',
            'description' => 'Hiển thị danh sách tin tuyển dụng'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    protected function loadDsTinTuyenDung()
    {
        $query = TinTuyenDung::all();
        return $query;
    }

    public function dsTins()
    {
        return $this->loadDsTinTuyenDung();
    }

}
