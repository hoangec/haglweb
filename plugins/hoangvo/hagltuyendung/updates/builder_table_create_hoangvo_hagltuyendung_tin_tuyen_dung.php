<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoHagltuyendungTinTuyenDung extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('tua_de');
            $table->integer('so_luong')->unsigned()->default(1);
            $table->string('hinh_thuc')->default('toan-thoi-gian');
            $table->string('do_tuoi')->nullable();
            $table->string('gioi_tinh')->default('khong-bat-buoc');
            $table->string('kinh_nghiem');
            $table->string('dia_diem_lam_viec');
            $table->string('thanh_phan')->nullable();
            $table->text('phuc_loi')->nullable();
            $table->text('mo_ta_cong_viec');
            $table->date('yeu_cau');
            $table->string('lien_he');
            $table->date('ngay_dang_tuyen')->default(now());
            $table->date('ngay_het_han')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_hagltuyendung_tin_tuyen_dung');
    }
}
