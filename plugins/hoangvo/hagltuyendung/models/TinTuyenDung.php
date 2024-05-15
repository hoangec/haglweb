<?php
namespace Hoangvo\HaglTuyenDung\Models;

use Model;
use Carbon\Carbon;
use Tailor\Models\GlobalRecord ;
/**
 * Model
 */
class TinTuyenDung extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    protected $slugs = ['slug' => 'tua_de'];
    protected static $tuyenDungSettings;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Thiết lập giá trị cho thuộc tính tĩnh từ kết quả của phương thức tĩnh
        self::$tuyenDungSettings = GlobalRecord::findForGlobal('HAGL\TuyenDung\Settings');
        $this->lien_he = self::$tuyenDungSettings->lien_he;
    }
    /**
     * @var string table in the database used by the model.
     */
    public $table = 'hoangvo_hagltuyendung_tin_tuyen_dung';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    // public $attributes = [
    //     'lien_he' => 'self::$tuyenDungSettings '// Giá trị mặc định cho thuộc tính status
    // ];

    public function getNoiLamViecOptions()
    {
        return [
            'vn' => 'Việt Nam',
            'lao' => 'Lào',
            'cam' => 'Campuchia'
        ];
    }
    public $hasMany = [
        'ds_ung_vien' => UngVien::class,
    ];



    public function getNganhNgheOptions(){
        if(self::$tuyenDungSettings->ds_nganh_nghe) {
            return   self::$tuyenDungSettings->ds_nganh_nghe->pluck('ten','slug')->toArray();
        }
        return [
            'lao-dong-pho-thong' => 'Lao động phổ thông',
            'ke-toan' => 'Kế toán',
            'cntt' => 'Công nghệ thông tin',
            'ks-nn' => 'Kỹ sư nông nghiệp'
        ];
    }
    public function getPhucLoiOptions(){
        if(self::$tuyenDungSettings->ds_phuc_loi) {
            // dd(  $tuyenDungSettings->ds_phuc_loi->pluck('ten','slug')->toArray());
            return self::$tuyenDungSettings->ds_phuc_loi->pluck('ten','slug')->toArray();
        }
        return [
            'bao-hiem' => 'Bảo hiểm theo quy định',
        ];
    }
    public function checkPhucLoiIcon($fileName){
        return file_exists(themes_path('hagl/assets/images/' . $fileName . '.png'));
    }
    public function getSoNgayHetHan(){
        $ngayHienTai = Carbon::now('Asia/Ho_Chi_Minh');
        $ngayHetHan = 0;
        if(!is_null($this->ngay_het_han)){
            $ngay2 = Carbon::createFromFormat('Y-m-d', $this->ngay_het_han, 'Asia/Ho_Chi_Minh');
            $ngayHetHan = $ngayHienTai->isSameDay($ngay2) || $ngayHienTai->diffInDays($ngay2,false) < 0 ? 0 :  $ngayHienTai->diffInDays($ngay2,false) + 1;
        }
        return $ngayHetHan ;
    }

    public function isNew() {
        $ngayDangTuyen = new Carbon($this->ngay_dang_tuyen);
        $tuanToi = $ngayDangTuyen->addDays(7);
        $ngayHienTai = Carbon::now();
        if($ngayHienTai <= $tuanToi){
            return true;
        }
        else {
            return false;
        }
    }

    public function scopeTinTheoQuocGiaFilter($query, $scope)
    {
        if($scope != 'all') {
            return $query->where('noi_lam_viec',$scope);
        }
        // return $query->all();
        //return $query->whereIn('my_filter_attribute', (array) $scope->value);
    }


}
