<?php namespace Hoangvo\HaglSanPham;

use System\Classes\PluginBase;
use Event;
use Tailor\Models\GlobalRecord;
/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'HAGL Sản phẩm Plugin',
            'description' => 'Cung cấp các chức năng cho chức năng sản phẩm',
            'author' => 'Hoang Vo',
            'icon' => 'icon-leaf'
        ];
    }
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

        Event::listen('blakejones.magicforms.beforeSaveRecord', function (&$formdata, $component) {

            // Get department input value
            if ($component == 'formDangKySanPham') {
                $thiTruong = $formdata['formThiTruongID'];
                $sanPhamSettings = GlobalRecord::findForGlobal('SanPham\Settings');
                $email = null;
                switch ($thiTruong) {
                    case 'tq':
                        if($sanPhamSettings->email_kd_tq) {
                            $email[$sanPhamSettings->email_kd_tq] = $sanPhamSettings->email_kd_tq;
                        }
                        if($sanPhamSettings->email_ql_tq) {
                            $email[$sanPhamSettings->email_ql_tq] = $sanPhamSettings->email_ql_tq;
                        }
                        break;
                    case 'vn':
                        if($sanPhamSettings->email_kd_vn) {
                            $email[$sanPhamSettings->email_kd_vn] = $sanPhamSettings->email_kd_vn;
                        }
                        if($sanPhamSettings->email_ql_vn) {
                            $email[$sanPhamSettings->email_ql_vn] = $sanPhamSettings->email_ql_vn;
                        }
                        break;
                    case 'nb':
                        if($sanPhamSettings->email_kd_nb) {
                            $email[$sanPhamSettings->email_kd_nb] = $sanPhamSettings->email_kd_nb;
                        }
                        if($sanPhamSettings->email_ql_nb) {
                            $email[$sanPhamSettings->email_ql_nb] = $sanPhamSettings->email_ql_nb;
                        }
                        break;
                    case 'hq':
                        if($sanPhamSettings->email_kd_hq) {
                            $email[$sanPhamSettings->email_kd_hq] = $sanPhamSettings->email_kd_hq;
                        }
                        if($sanPhamSettings->email_ql_hq) {
                            $email[$sanPhamSettings->email_ql_hq] = $sanPhamSettings->email_ql_hq;
                        }
                        break;
                    default:
                        $email = null;
                        break;
                }
                $component->setProperty('mail_recipients', $email);
                if($email == null) {
                    \Log::debug('Không có địa chỉ email để gửi thông báo khi có khách hàng đăng ký email ');
                }else {
                    \Log::debug('Đã gửi email đăng ký sản phẩm cho record '.  $formdata['formThiTruongID']);
                }
            }


            // Override component mail recipients
            // Log::info('Showing user profile for user: ', $email);
            // \Log::debug('danh sach gui mail tai plugin',$email);


        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
