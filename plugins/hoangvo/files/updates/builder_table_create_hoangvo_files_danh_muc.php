<?php namespace Hoangvo\Files\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHoangvoFilesDanhMuc extends Migration
{
    public function up()
    {
        Schema::create('hoangvo_files_danh_muc', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('ten');
            $table->text('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hoangvo_files_danh_muc');
    }
}
