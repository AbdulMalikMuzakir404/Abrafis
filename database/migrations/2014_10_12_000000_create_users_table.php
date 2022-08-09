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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nis', 20)->nullable();
            $table->string('tgl_lahir', 30)->nullable();
            $table->enum('jk', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jurusan', ['rpl', 'mm', 'elektro'])->nullable();
            $table->string('jurusan_berapa')->nullable();
            $table->string('kelas', 5)->nullable();
            $table->string('nama_ortu', 50)->nullable();
            $table->text('alamat');
            $table->string('no_wa', 15);
            $table->string('no_hp', 15);
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
