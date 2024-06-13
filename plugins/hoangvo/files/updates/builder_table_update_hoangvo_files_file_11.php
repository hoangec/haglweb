<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesFile11 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->integer('site_root_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->dropColumn('site_root_id');
        });
    }
}
