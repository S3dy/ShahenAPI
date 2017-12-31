<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {           
        //     Schema::create('freelancer_sign_up', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('fname');
        //     $table->string('lname');
        //     $table->string('country');
        //     $table->string('email')->unique();
        //     $table->string('uname')->unique();
        //     $table->string('password');
        //     $table->string('how_about');
        //     $table->timestamps();
        // });

        //     Schema::create('forget_password', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('email');
        //     $table->string('password');
        //     $table->timestamps();
        // });
        // Schema::create('cmpny_sign_up', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('fname')->unique();
        //     $table->string('lname');
        //     $table->string('cmpnyname');
        //     $table->string('country');
        //     $table->string('email')->unique();       
        //     $table->string('password');
        //     $table->timestamps();
        // });
        // Schema::create('projects', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('title');
        //     $table->string('description');
        //     $table->string('image');
        //     $table->string('files');
        //     $table->string('contrct');
        //     $table->string('category');
        //     $table->string('sub_category');
        //     $table->string('url');
        //     $table->string('date');
        //     $table->string('skills');
        //     $table->string('certificate');
        //     });
          Schema::create('jobpost', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_your_job_posting');
            $table->string('category_and_subcategory');
            $table->string('how_many_freelancers');
            $table->string('skills');
            $table->string('payment_by');
            $table->string('exp_level');
            $table->string('how_long_expect_this_job');
            $table->string('time_commitment_for_this_job');
            $table->string('what_help_need_with');
            $table->string('what_will_freelancer_doing');
            $table->string('qualities_needed_to_success');
            //$table->string('freelancer_preferences');
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
        Schema::drop('users');
    }
}
