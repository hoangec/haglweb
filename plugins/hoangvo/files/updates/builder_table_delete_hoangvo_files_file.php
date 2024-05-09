<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteHoangvoFilesFile extends Migration
{
    public function up()
    {
        Schema::dropIfExists('hoangvo_files_file');
    }
    
    public function down()
    {
        Schema::create('hoangvo_files_file', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('ten');
            $table->string('mo_ta', 255)->nullable();
            $table->integer('thu_tu')->unsigned()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('danh_muc_id')->unsigned();
            $table->smallInteger('nam_du_lieu');
            $table->smallInteger('quy_du_lieu');
            $table->date('ngay_dang')->nullable();
        });
    }
}
