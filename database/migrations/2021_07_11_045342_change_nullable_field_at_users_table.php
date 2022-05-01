<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableFieldAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone_number')->nullable()->change();
            $table->string('rent_name')->nullable()->change();
            $table->integer('rent_status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone_number')->nullable(false)->change();
            $table->string('rent_name')->nullable(false)->change();
            $table->integer('rent_status')->nullable(false)->change();
        });
    }
}
