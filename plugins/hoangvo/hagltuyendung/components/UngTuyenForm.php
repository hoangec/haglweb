<?php namespace Hoangvo\Hagltuyendung\Components;

use Cms\Classes\ComponentBase;
use Hoangvo\HaglTuyenDung\Models\UngVien;
use Validator;
use Input;
use Redirect;
use Flash;
/**
 * UngTuyenForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class UngTuyenForm extends ComponentBase
{
    use \October\Rain\Database\Traits\Validation;
    public function componentDetails()
    {
        return [
            'name' => 'UngTuyenForm Component',
            'description' => 'Form thực hiện chức năng ứng tuyển'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'tuyenDungId' => [
                'title' =>  'ID Tin tuyển dụng',
                'description' => 'ID Tin tuyển dụng',
                'default' => '',
                'type' => 'string',
            ],
            'tuyenDungSlug' => [
                'title' =>  'Slug Tin tuyển dụng',
                'description' => 'Slug Tin tuyển dụng',
                'default' => '',
                'type' => 'string',
            ],
            'tuyenDungTuaDe' => [
                'title' =>  'Tựa đề tin tuyển dụng',
                'description' => 'Tựa đề tin tuyển dụng',
                'default' => '',
                'type' => 'string',
            ]
        ];
    }




    public function  onSaveUngVien(){
        $messages = [
            'hoTen.required' => 'Xin vui lòng nhập thông tin họ tên',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.required' => 'Xin vui lòng nhập địa chỉ email liên hệ',
            'soDienThoai.required' => 'Xin vui lòng nhập số điện thoại',
            'soDienThoai.numeric
            ' => 'Nhập số điện thoại hợp lệ',
            'cvFile.required' => 'Xin vui lòng chọn file cv để tải lên',
            'cvFile.mimes' => 'Chỉ các định dạng file PDF, DOCX, DOC được hỗ trợ',
            'cvFile.max' => 'Kích thước file tải lên tối đa là 1MB'
        ];
        $validator = Validator::make(
            [
                'tuyenDungId' => Input::get('tuyenDungId'),
                'hoTen' => Input::get('hoTen'),
                'email' => Input::get('email'),
                'soDienThoai' => Input::get('soDienThoai'),
                'cvFile' => Input::file('cvFile')
            ],
            [
                'tuyenDungId' => 'required',
                'hoTen' => 'required',
                'email' => 'required|email',
                'soDienThoai' => 'required|numeric',
                'cvFile' => 'required|mimes:pdf,docx,doc|max:1024'
            ],
            $messages
        );
        if($validator->fails()){
            Flash::error('Xin vui lòng kiểm tra dữ liệu nhập!');
            return ['#result' => $this->renderPartial('@messages', [
                'errorMsgs' => $validator->messages()->all(),
                'fieldMsgs' => $validator->messages()
            ])];

        }
        else {
            $ungVien = New UngVien();
            $ungVien->ho_ten = Input::get('hoTen');
            $ungVien->email = Input::get('email');
            $ungVien->dien_thoai =  Input::get('soDienThoai');
            $ungVien->cvFile = files('cvFile');
            $ungVien->tin_tuyen_dung_id =  Input::get('tuyenDungId');
            $ungVien->save();
            Flash::success('Hoàn thành việc ứng tuyển, xin cám ơn!');

        }
    }
}
