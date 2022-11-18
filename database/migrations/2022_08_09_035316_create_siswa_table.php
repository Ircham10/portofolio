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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn');
            $table->string('alamat');
            $table->string('jk');
            $table->string('foto');
            $table->string('email');
            $table->text('about');

            $table->timestamps();
        });
    }

    // Siswa::create([
    //     "nama" => "Arva",
    //     "nisn" => "522561",
    //     "alamat" => "Ndoly",
    //     "jk" => "laki-laki",
    //     "foto" => "Arva.jpg",
    //     "email" => "Arva@gmail.com",
    //     "about" => "saya Arva",
    // ]);

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
