<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('password_updated_at');
            $table->boolean('private_flag');
            $table->date('birthday_date');
            $table->unsignedInteger('sex_id')->nullable();
            $table->string('icon_url');
            $table->string('password_reset_token');
            $table->timestamp('token_expires_at');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('user_id');
            $table->foreign('sex_id')
                ->references('sex_id')->on('sexes')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}