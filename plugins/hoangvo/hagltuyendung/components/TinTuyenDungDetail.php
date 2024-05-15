<?php namespace Hoangvo\Hagltuyendung\Components;

use Cms\Classes\ComponentBase;

/**
 * TinTuyenDungDetail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class TinTuyenDungDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'TinTuyenDungDetail Component',
            'description' => 'Hiện thị chi tiết tin tuyển dụng'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [

        ];
    }
}
