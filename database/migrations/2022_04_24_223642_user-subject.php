<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user-subject', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
        
            $table->integer('subject_id')->unsigned();
        
            $table->foreign('user_id')->references('id')->on('users')
        
                ->onDelete('cascade');
        
            $table->foreign('subject_id')->references('id')->on('subjects')
        
                ->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
