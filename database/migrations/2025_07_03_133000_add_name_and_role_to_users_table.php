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
        // cek apakah kolom 'name' juga sudah ada
        if (!Schema::hasColumn('users', 'name')) {
            $table->string('name')->after('id');
        }

        // kolom role sudah ada, jadi tidak ditambahkan lagi
        // $table->string('role')->default('client');
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
            //
        });
    }
};
