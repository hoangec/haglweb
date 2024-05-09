<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHoangvoFilesFile3 extends Migration
{
    public function up()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->smallInteger('nam_du_lieu');
            $table->smallInteger('quy_du_lieu');
        });
    }
    
    public function down()
    {
        Schema::table('hoangvo_files_file', function($table)
        {
            $table->dropColumn('nam_du_lieu');
            $table->dropColumn('quy_du_lieu');
        });
    }
}
