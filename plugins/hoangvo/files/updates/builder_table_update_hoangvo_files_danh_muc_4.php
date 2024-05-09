<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesDanhMuc4 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->integer('thu_tu')->unsigned()->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_danh_muc', function($table)
        {
            $table->dropColumn('thu_tu');
        });
    }
}
