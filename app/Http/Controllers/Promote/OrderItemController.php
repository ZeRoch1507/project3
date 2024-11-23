<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Menu;
use App\Models\OrderItem;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $cart = session()->get('cart', []);
        $menu = Menu::find($validated['menu_id']);

        if ($menu) {
            if (isset($cart[$validated['menu_id']])) {
                $cart[$validated['menu_id']]['quantity'] += $validated['quantity'];
            } else {
                $cart[$validated['menu_id']] = [
                    'menu_id' => $validated['menu_id'],
                    'quantity' => $validated['quantity'],
                    'price' => $validated['price'],
                    'menu' => $menu,
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'เพิ่มเมนูลงตะกร้าสำเร็จ');
        }

        return redirect()->back()->with('error', 'ไม่พบเมนูที่คุณต้องการ');
    }

    public function showCategories()
    {
        $categories = Category::with('menus')->get(); // ดึงข้อมูลหมวดหมู่พร้อมเมนู
        return view('order.categories', compact('categories'));
    }

    public function index(Request $request)
    {
        $tableNumber = $request->query('table_number', null);
        $categories = Category::all();
        $menus = Menu::all();
        $orders = Order::all();

        return view('order.index', compact('categories', 'menus', 'orders', 'tableNumber'));
    }

    public function confirm(Request $request)
    {
        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->back()->with('error', 'ตะกร้าของคุณว่าง');
        }

        $validated = $request->validate([
            'table_number' => 'required|string',
        ]);

        $order = new Order();
        $order->order_ref = strtoupper(uniqid());
        $order->token = bin2hex(random_bytes(16));
        $order->total_price = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $order->status = 1;
        $order->table_number = $validated['table_number'];
        $order->save();

        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $item['menu_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->menu_name = $item['menu']->name; // ใช้ชื่อเมนู
            $orderItem->save();
        }

        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'คำสั่งซื้อของคุณถูกบันทึกเรียบร้อย');
    }

    public function createOrderFromQR(Request $request)
    {
        $tableNumber = $request->query('table');

        if (!$tableNumber) {
            return redirect()->route('home')->with('error', 'ไม่พบหมายเลขโต๊ะ');
        }

        $categories = Category::with('menus')->get();
        return view('order.qr_create', compact('tableNumber', 'categories'));
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::find($orderId);

        if ($order) {
            $order->status = $status;
            $order->save();
            return redirect()->route('admin.order.index')->with('success', 'อัปเดตสถานะสำเร็จ');
        }

        return redirect()->route('admin.order.index')->with('error', 'ไม่พบคำสั่งซื้อ');
    }
}
