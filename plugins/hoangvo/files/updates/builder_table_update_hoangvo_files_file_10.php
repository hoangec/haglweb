<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesFile10 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->integer('site_id')->nullable()->unsigned();
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->dropColumn('site_id');
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
