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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('school_group_id')->nullable()->after('email');
            $table->string('nisn', 100)->change();
            $table->enum('type', ['siswa', 'karyawan', 'guru']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('school_group_id');
            $table->integer('nisn')->change();
            $table->dropColumn('type');
        });
    }
};
