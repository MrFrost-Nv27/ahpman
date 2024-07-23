<?php

namespace App\Database\Migrations;

use App\Libraries\Eloquent;
use CodeIgniter\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class InitMigration extends Migration
{
    public function up()
    {
        Eloquent::schema()->create("auth_jwt", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid('user_id')
                ->constrained("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text("access_token");
            $table->string("refresh_token");
            $table->timestamps();
        });

        Eloquent::schema()->create("siswa", function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->enum("jenis_kelamin", ["L", "P"])->default("L");
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->text("alamat")->nullable();
            $table->string("asal_sekolah")->nullable();
            $table->string("nohp")->nullable();
            $table->string("nama_ayah")->nullable();
            $table->string("nama_ibu")->nullable();
            $table->string("pekerjaan_ayah")->nullable();
            $table->string("pekerjaan_ibu")->nullable();
            $table->text("foto")->default("profile.png");
            $table->timestamps();
        });

        Eloquent::schema()->create("kriteria", function (Blueprint $table) {
            $table->id();
            $table->string("kode");
            $table->string("nama");
            $table->timestamps();
        });

        Eloquent::schema()->create("kriteria_perbandingan", function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_left_id')
                ->constrained("kriteria")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('kriteria_right_id')
                ->constrained("kriteria")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float("bobot");
            $table->timestamps();
        });

        Eloquent::schema()->create("subkriteria", function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')
                ->constrained("kriteria")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float("bottom_treshold");
            $table->float("upper_treshold");
            $table->string("keterangan");
            $table->float("bobot");
            $table->timestamps();
        });

        Eloquent::schema()->create("nilai", function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')
                ->constrained("siswa")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('kriteria_id')
                ->constrained("kriteria")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float("nilai");
            $table->timestamps();
        });
    }

    public function down()
    {
        Eloquent::schema()->dropIfExists('auth_jwt');
        Eloquent::schema()->dropIfExists('siswa');
        Eloquent::schema()->dropIfExists('kriteria');
        Eloquent::schema()->dropIfExists('kriteria_perbandingan');
        Eloquent::schema()->dropIfExists('subkriteria');
        Eloquent::schema()->dropIfExists('nilai');
    }
}
