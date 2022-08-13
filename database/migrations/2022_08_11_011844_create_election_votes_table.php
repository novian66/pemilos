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
        Schema::create('election_votes', function (Blueprint $table) {
            $table->id();
            // foreign key user id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // foreign key school id
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');

            // foreign key election_school id
            $table->unsignedBigInteger('election_school_id');
            $table->foreign('election_school_id')->references('id')->on('election_schools')->onDelete('cascade');

            // foreign key election_school_candidate id
            $table->unsignedBigInteger('election_school_candidate_id');
            $table->foreign('election_school_candidate_id')->references('id')->on('election_school_candidates')->onDelete('cascade');
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
        Schema::dropIfExists('election_votes');
    }
};
