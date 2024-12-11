<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Tạo trường id (auto-increment)
            $table->string('brand'); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->string('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status')->default(false); // Trạng thái cho thuê
            $table->foreignId('renter_id')->nullable()->constrained('renters')->onDelete('set null'); // Khóa ngoại tham chiếu tới bảng renters
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}
