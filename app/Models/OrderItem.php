<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items'; // ชื่อตารางที่ต้องการ

    protected $fillable = ['order_id', 'menu_id', 'quantity', 'price']; // คอลัมน์ที่สามารถบันทึกได้

    // ความสัมพันธ์กับ menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);  // เชื่อมโยงกับ menu
    }

    // ความสัมพันธ์กับ Order
    public function order()
    {
        return $this->belongsTo(Order::class); // Laravel จะหาความสัมพันธ์กับ primary key (id) อัตโนมัติ
    }

    public function index()
    {
        // ดึงคำสั่งซื้อพร้อมกับ items และ menu โดยใช้ eager loading
        $order = Order::with('items.menu')->get();

        // ส่งข้อมูลไปยังวิว
        return view('backend.order.index', compact('order'));
    }
}
