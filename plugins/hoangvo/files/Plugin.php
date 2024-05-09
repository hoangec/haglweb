<?php namespace Hoangvo\Files;

use Hoangvo\Files\Components\DanhSachDanhMuc;
use System\Classes\PluginBase;
use Hoangvo\Files\Components\DanhSachFile;
/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'HAGL',
            'description' => 'plugin quản lý file cho web page hage',
            'author' => 'Hoang Vo',
            'icon' => 'icon-leaf'
        ];
    }
     public function register()
    {

    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            DanhSachFile::class => 'danhSachFile',
            DanhSachDanhMuc::class => 'danhSachDanhMuc',
        ];

    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
