<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoHagltuyendungUngVien extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_hagltuyendung_ung_vien', function($table)
        {
            $table->integer('tin_tuyen_dung_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_hagltuyendung_ung_vien', function($table)
        {
            $table->dropColumn('tin_tuyen_dung_id');
        });
    }
}
