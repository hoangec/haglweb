<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoFilesFile2 extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_files_file', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('ten');
            $table->text('mo_ta')->nullable();
            $table->date('ngay_dang')->default(now());
            $table->date('nam_du_lieu')->default(now());
            $table->smallInteger('quy_du_lieu')->nullable()->unsigned();
            $table->smallInteger('thu_tu')->unsigned()->default(1);
            $table->integer('danh_muc_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_files_file');
    }
}
