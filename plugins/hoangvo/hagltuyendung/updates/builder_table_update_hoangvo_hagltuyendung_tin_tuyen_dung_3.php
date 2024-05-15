<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoHagltuyendungTinTuyenDung3 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->string('anh_dai_dien')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->dropColumn('anh_dai_dien');
        });
    }
}
