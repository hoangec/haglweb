<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoHagltuyendungTinTuyenDung4 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
