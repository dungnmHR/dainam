<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocvienchinhquiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocvienchinhquies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mahv')->unique();
            $table->string('ngaydk')->nullable();
            $table->string('cmt')->nullable();
            $table->string('ten');
            $table->string('ngaysinh')->nullable();
            $table->boolean('gioitinh')->nullable();
            $table->string('dantoc')->nullable();
            $table->integer('noisinh')->nullable();
            $table->string('khuvucut')->nullable();
            $table->string('doituongut')->nullable();
            $table->string('diachi')->nullable();
            $table->integer('tinh_id')->nullable();
            $table->integer('huyen_id')->nullable();
            $table->integer('nguontt_id')->nullable();
            $table->string('xa')->nullable();
            $table->string('sdt');
            $table->string('sdt_2')->nullable();
            $table->string('email')->nullable();
            $table->integer('doitac_id')->nullable();
            $table->string('fb')->nullable();
            $table->integer('nam')->nullable();
            $table->boolean('ttnhaphoc')->nullable();
            $table->integer('ptxettuyen')->nullable();
            $table->integer('nganhxt_id')->nullable();
            $table->integer('thxettuyen')->nullable();
            $table->string('mapbd')->nullable();
            $table->string('magnh')->nullable();
            $table->string('ngaygnh')->nullable();
            $table->float('diem_1')->nullable();
            $table->float('diem_2')->nullable();
            $table->float('diem_3')->nullable();
            $table->float('tongdiem')->nullable();
            $table->integer('truong_id')->nullable();
            $table->boolean('donxt')->nullable();
            $table->boolean('hocba')->nullable();
            $table->boolean('bangcntt')->nullable();
            $table->boolean('send_email')->nullable();
            $table->boolean('send_sms')->nullable();
            $table->boolean('send_giayht')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('hocvienchinhquies');
    }
}
