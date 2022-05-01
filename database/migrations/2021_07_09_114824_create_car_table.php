<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('users_id');
            $table->integer('categories_id');
            $table->integer('price');
            $table->integer('penalty');
            $table->longText('description');
            $table->integer('status');
            $table->integer('v_regist_number');
            $table->string('colour');
            $table->string('slug');
            $table->string('driver');

            $table->softDeletes();
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
        Schema::dropIfExists('car');
    }
}
