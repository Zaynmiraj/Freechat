<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('fb_account')->nullable();
            $table->string('tr_account')->nullable();
            $table->string('ins_account')->nullable();
            $table->string('web_account')->nullable();
            $table->string('profesion')->nullable();
            $table->string('living_place')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
