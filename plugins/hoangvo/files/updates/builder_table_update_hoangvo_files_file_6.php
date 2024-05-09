<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesFile6 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}
