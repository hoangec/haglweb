<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesDanhMuc3 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->renameColumn('danh_muc_cha', 'danh_muc_cha_id');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->renameColumn('danh_muc_cha_id', 'danh_muc_cha');
        });
    }
}
