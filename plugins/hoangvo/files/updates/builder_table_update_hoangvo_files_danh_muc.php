<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesDanhMuc extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->text('loai_danh_muc');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->dropColumn('loai_danh_muc');
        });
    }
}
