<?php namespace Hoangvo\HaglTuyenDung;

use Hoangvo\Hagltuyendung\Components\UngTuyenForm;
use System\Classes\PluginBase;
use Hoangvo\Hagltuyendung\Components\DsTinTuyenDung;
use Hoangvo\Hagltuyendung\Components\TinTuyenDungDetail;
/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
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
            DsTinTuyenDung::Class => 'dsTinTuyenDung',
            TinTuyenDungDetail::class => 'tinTuyenDungDetail',
            UngTuyenForm::class => 'ungTuyenForm'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
