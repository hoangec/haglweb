<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoFilesFiles extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_files_files', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('ten');
            $table->text('mo_ta');
            $table->smallInteger('thu_tu')->unsigned()->default(1);
            $table->date('ngay_dang');
            $table->date('nam_du_lieu');
            $table->smallInteger('quy_du_lieu')->nullable()->unsigned();
            $table->integer('danh_muc')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_files_files');
    }
}
