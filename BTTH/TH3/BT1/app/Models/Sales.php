<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    // Bỏ qua timestamps nếu không sử dụng (chẳng hạn nếu không có cột created_at và updated_at)
    public $timestamps = false;

    // Định nghĩa khóa chính
    protected $primaryKey = 'sale_id';

    // Các thuộc tính có thể gán (fillable)
    protected $fillable = [
        'medicine_id',
        'quantity',
        'sale_date',
        'customer',
    ];

    // Quan hệ với model Medicines (nếu có)
    public function medicine()
    {
        return $this->belongsTo(Medicines::class, 'medicine_id', 'medicine_id');
    }
}
