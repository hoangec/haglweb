<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesDanhMuc2 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->integer('danh_muc_cha')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->dropColumn('danh_muc_cha');
        });
    }
}
