<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreign('group_id')->references('id')->on('admin_groups');
            $table->string('firstname');
            $table->string('surname');
            $table->string('lastname')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cellular');
            $table->integer('login_attempts')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('admins');
    }
};
