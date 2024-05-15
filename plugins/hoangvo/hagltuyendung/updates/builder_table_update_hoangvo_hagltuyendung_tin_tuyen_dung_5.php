<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoHagltuyendungTinTuyenDung5 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->string('nganh_nghe');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->dropColumn('nganh_nghe');
        });
    }
}
