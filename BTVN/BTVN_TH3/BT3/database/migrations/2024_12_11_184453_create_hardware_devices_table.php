<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareDevicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động là khóa chính
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị (Mouse, Keyboard, Headset)
            $table->boolean('status'); // Trạng thái hoạt động (true/false)
            $table->foreignId('center_id')->constrained('it_centers'); // Khóa ngoại tham chiếu đến it_centers.id
            $table->timestamps(); // Created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
}
