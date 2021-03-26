<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentbatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentbatch', function (Blueprint $table) {
            $table->id();
            $table->string('creater_email');
            $table->string('batch_id');
            $table->string('batch_name');
            $table->string('enrollment');
            $table->string('is_deleted');
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
        Schema::drop('studentbatch');
    }
}
