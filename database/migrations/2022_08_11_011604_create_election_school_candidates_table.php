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
        Schema::create('election_school_candidates', function (Blueprint $table) {
            $table->id();
            // foreign key school id
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');

            // foreign key election_school id
            $table->unsignedBigInteger('election_school_id');
            $table->foreign('election_school_id')->references('id')->on('election_schools')->onDelete('cascade');

            $table->integer('urutan');
            $table->string('nama');
            $table->text('description');
            $table->string('token');
            $table->string('poster');
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
        Schema::dropIfExists('election_school_candidates');
    }
};
