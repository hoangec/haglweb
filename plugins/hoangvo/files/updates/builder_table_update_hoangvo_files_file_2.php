<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesFile2 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->integer('danh_muc_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->dropColumn('danh_muc_id');
        });
    }
}
