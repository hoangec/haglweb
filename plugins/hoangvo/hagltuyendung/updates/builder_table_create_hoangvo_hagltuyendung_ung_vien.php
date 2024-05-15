<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoHagltuyendungUngVien extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_hagltuyendung_ung_vien', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('ho_ten');
            $table->string('email');
            $table->string('dien_thoai');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_hagltuyendung_ung_vien');
    }
}
