<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesDanhMuc5 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->text('anh_dai_dien')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->dropColumn('anh_dai_dien');
        });
    }
}
