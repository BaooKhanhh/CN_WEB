<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu không tuân theo quy ước Laravel
    // protected $table = 'medicines';

    // Xác định khóa chính của bảng
    protected $primaryKey = 'medicine_id';

    // Đảm bảo không sử dụng timestamps
    public $timestamps = false;

    // Xác định các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['name', 'brand', 'dosage', 'form', 'price', 'stock'];

    // Quan hệ với bảng Sales: Một medicine có thể có nhiều sales
    public function sales()
    {
        return $this->hasMany(Sales::class, 'medicine_id', 'medicine_id');
    }
}
