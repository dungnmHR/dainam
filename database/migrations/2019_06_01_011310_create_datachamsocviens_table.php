<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatachamsocviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datachamsocviens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ngaygoi')->nullable();
            $table->string('ngaygoilai')->nullable();
            $table->integer('hocvien_id');
            $table->integer('chamsocvien_id');
            $table->string('ttdata')->nullable();
            $table->integer('langoi')->nullable();
            $table->text('noidung')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('datachamsocviens');
    }
}
