<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;  // เพิ่มบรรทัดนี้
use Carbon\Carbon;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        // ดึงรายการคำสั่งซื้อทั้งหมดพร้อมสินค้าที่เกี่ยวข้อง
        $orderQuery = Order::with('items.menu')->latest();

        // ดึงวันที่แรกสุดที่มีคำสั่งซื้อ
        $firstOrderDate = Order::min('created_at');

        // รับวันที่ที่เลือกจาก request หรือใช้วันที่แรกสุดเป็นค่า default
        $selectedDate = $request->get('date') ?? Carbon::parse($firstOrderDate)->format('Y-m-d');

        // กำหนดช่วงเวลาในการกรองตามวันที่ที่เลือก
        $startDate = Carbon::parse($selectedDate)->startOfDay();
        $endDate = Carbon::parse($selectedDate)->endOfDay();

        // กรองคำสั่งซื้อในช่วงเวลาที่กำหนด
        $order = $orderQuery->whereBetween('created_at', [$startDate, $endDate])->paginate(10);

        // ดึงรายการวันที่ทั้งหมดสำหรับ dropdown
        $availableDates = Order::selectRaw("DATE(created_at) as order_date")
            ->distinct()
            ->orderBy('order_date', 'desc')
            ->pluck('order_date')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            });

        // ส่งข้อมูลไปยัง view
        return view('backend.order.index', [
            'order' => $order,
            'firstOrderDate' => Carbon::parse($firstOrderDate)->format('d/m/Y'),
            'selectedDate' => $selectedDate,
            'availableDates' => $availableDates,
        ]);
    }

    public function updateStatus($orderId, $status)
    {
        try {
            $order = order::findOrFail($orderId);
            $order->status = $status;
            $order->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }




    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
