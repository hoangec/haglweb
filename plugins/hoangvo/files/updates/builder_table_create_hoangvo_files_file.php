<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoFilesFile extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_files_file', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('ten');
            $table->string('mo_ta')->nullable();
            $table->integer('thu_tu')->unsigned()->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_files_file');
    }
}
