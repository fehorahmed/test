<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateDefaultAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('default_admin', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::table('admins')->insert([
            [
                'name'=>'Fehor Ahmed',
                'email'=>'fehor@gmail.com',
                'phone'=>'01750637286',
                'password'=>Hash::make(12345),
            ],
            [
                'name'=>'Masudur Rahman',
                'email'=>'masud@gmail.com',
                'phone'=>'01750637200',
                'password'=>Hash::make(12345),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_admin');
    }
}
