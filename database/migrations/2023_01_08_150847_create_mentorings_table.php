<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('client');
            $table->string('name_leader');
            $table->string('email_leader');
            $table->string('foto_leader');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('progress');
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
        Schema::dropIfExists('mentorings');
    }
}
