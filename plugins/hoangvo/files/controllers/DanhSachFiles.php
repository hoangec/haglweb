<?php
namespace Hoangvo\Files\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Hoangvo\Files\Models\DanhMuc as DanhMucFileModel;
use Illuminate\Http\Request;
use Redirect;
use Flash;

class DanhSachFiles extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Hoangvo.Files', 'co-dong-menu-item', 'files-sub-item');
    }

    function onLoadDanhMuc()
    {
        $dsDanhMuc = DanhMucFileModel::all();
        return $this->makePartial('danh_muc', ['dsDanhMuc' => $dsDanhMuc]);
    }
    function onDanhMucSubmit()
    {
        $danhMucChonInput = input('danhMucChon');
        $danhMucChon = DanhMucFileModel::find($danhMucChonInput);
        if ($danhMucChon == null) {
            Flash::success('Signup complete!');
            return Redirect::refresh();
        } else {
            return Redirect::to('backend/hoangvo/files/danhsachfiles');
        }

    }

    public function create()
    {
        $danhMucChonInput = input('danhMucChon');
        $danhMucChon = DanhMucFileModel::find($danhMucChonInput);
        if ($danhMucChon == null) {
            Flash::warning('Danh mục file không tồn tại !');
            // return Redirect::to('backend/hoangvo/files/danhsachfiles');
            return Backend::redirect('/hoangvo/files/danhsachfiles');
        } else {
            return $this->asExtension('FormController')->create();
        }

    }
    public function formExtendModel($model)
    {

        if ($this->formGetContext() === 'create') {
            $danhMucChonInput = input('danhMucChon');
            $danhMucChon = DanhMucFileModel::find($danhMucChonInput);
            if ($danhMucChon) {
                if($danhMucChon->loai_danh_muc == 'nam') {
                    $model->quy_du_lieu = 3;
                    // var_dump( $model->quy_du_lieu);
                }
                $model->_loai_danh_muc = $danhMucChon->loai_danh_muc;
            }
        }
        elseif($this->formGetContext() === 'update') {
            $model->_loai_danh_muc = $model->danh_muc->loai_danh_muc;
        }
    }
    public function formExtendFields($form)
    {
        $danhMucChonInput = input('danhMucChon');
        $danhMucChon = DanhMucFileModel::find($danhMucChonInput);
        // if ($this->formGetContext() === 'create') {
        //     if($danhMucChon->loai_danh_muc == 'quy'){
        //         $form->addFields([
        //             'quy_du_lieu' => [

        //             ]
        //         ]);
        //     }
        // }
        if ($danhMucChon) {
            $form->addFields([
                'danh_muc_id' => [
                    'label' => 'Danh mục được chọn',
                    'span' => 'right',
                    'type' => 'dropdown',
                    'readOnly' => true,
                    'default' => $danhMucChon->id,
                    'options' => [
                        $danhMucChon->id => $danhMucChon->ten
                    ]
                ],
            ]);

        }
    }
}

