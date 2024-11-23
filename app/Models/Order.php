<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    // ระบุฟิลด์ที่สามารถ fill ได้
    protected $fillable = ['order_ref', 'total_price', 'status', 'table_number'];

    // เชื่อมโยงกับ OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
