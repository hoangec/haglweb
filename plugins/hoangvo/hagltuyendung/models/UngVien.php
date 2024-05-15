<?php namespace Hoangvo\HaglTuyenDung\Models;

use Model;
use System\Models\File as SystemFile;
use Mail;
use Tailor\Models\GlobalRecord;
/**
 * Model
 */
class UngVien extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string table in the database used by the model.
     */
    public $table = 'hoangvo_hagltuyendung_ung_vien';

    protected static $tuyenDungSettings;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Thiết lập giá trị cho thuộc tính tĩnh từ kết quả của phương thức tĩnh
        self::$tuyenDungSettings = GlobalRecord::findForGlobal('HAGL\TuyenDung\Settings');
    }
    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsTo = [
        'tin_tuyen_dung' => TinTuyenDung::class
    ];

    public $attachOne = [
        "cvFile" => SystemFile::class,
    ];

    public function getCvFileLinkAttribute()
    {
        return $this->cvFile->getUrl();
    }

    public function afterSave()
    {
        if(self::$tuyenDungSettings->email_nhan_tin_ung_vien)
        {
            $vars = [
                'applicant_name' => $this->ho_ten,
                'applicant_email' => $this->email,
                'applicant_phone' => $this->dien_thoai,
                'cong_viec' => $this->tin_tuyen_dung->tua_de,
            ];
            Mail::send('hoangvo.hagltuyendung::mail.ung-vien-message',$vars, function($message){
                $message->to(self::$tuyenDungSettings->email_nhan_tin_ung_vien);
                $subj = 'Thông báo: Có ứng viên mới nộp hồ sơ vào vị trí công việc: ' .  $this->tin_tuyen_dung->tua_de;
                $message->subject($subj);
            });
        }
    }
}
