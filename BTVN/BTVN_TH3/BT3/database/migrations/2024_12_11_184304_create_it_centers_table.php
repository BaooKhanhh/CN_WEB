<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItCentersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động là khóa chính
            $table->string('name'); // Tên trung tâm
            $table->string('location'); // Địa điểm trung tâm
            $table->string('contact_email'); // Email liên hệ
            $table->timestamps(); // Created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_centers');
    }
}
