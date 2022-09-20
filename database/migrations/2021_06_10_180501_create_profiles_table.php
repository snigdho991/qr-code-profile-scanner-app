<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('headline')->nullable();
            $table->string('work_station')->nullable();
            $table->string('work_position')->nullable();
            $table->string('edu_school')->nullable();
            $table->string('edu_degree')->nullable();
            $table->string('location')->nullable();
            $table->string('skills')->nullable();
            $table->string('social_links')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
