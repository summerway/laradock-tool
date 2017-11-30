<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_host', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server_name',100)->comment("主机名");
            $table->string('project_name',100)->comment("项目名称");
            $table->string('desc',100)->comment("描述");
            $table->string('cover',200)->comment("封面");
            $table->string('path',200)->comment("地址");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_host');
    }
}
