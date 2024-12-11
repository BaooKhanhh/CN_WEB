<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' là khóa chính
            $table->string('name'); // Tên rạp chiếu
            $table->string('location'); // Địa chỉ
            $table->integer('total_seats'); // Tổng số ghế ngồi
            $table->timestamps(); // Created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
}
