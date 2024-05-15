<?php namespace Hoangvo\HaglTuyenDung\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoHagltuyendungTinTuyenDung6 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->boolean('tuyen_gap')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_hagltuyendung_tin_tuyen_dung', function($table)
        {
            $table->dropColumn('tuyen_gap');
        });
    }
}
