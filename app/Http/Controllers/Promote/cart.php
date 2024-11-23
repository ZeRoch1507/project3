<?php

namespace App\Http\Controllers\Promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu; // นำเข้า Model ของ Menu (แทน Product)
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // ฟังก์ชันสำหรับเพิ่มเมนูในตะกร้า
    public function addToCart(Request $request)
    {
        $menuId = $request->input('menu_id'); // เปลี่ยนจาก product_id เป็น menu_id
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // รับข้อมูลจาก session
        $cart = session()->get('cart', []);
        $cart[$menuId] = [
            'menu_id' => $menuId, // เปลี่ยนจาก product_id เป็น menu_id
            'quantity' => $quantity,
            'price' => $price,
        ];

        session()->put('cart', $cart);

        return response()->json(['message' => 'Menu added to cart']); // เปลี่ยนข้อความให้เหมาะสม
    }

    // ฟังก์ชันสำหรับลบเมนูออกจากตะกร้า
    public function removeFromCart($menuId) // เปลี่ยนจาก productId เป็น menuId
    {
        // ดึงตะกร้าสินค้าจาก session
        $cart = session()->get('cart', []);

        // ตรวจสอบการมีเมนูนี้ในตะกร้า
        if (isset($cart[$menuId])) {
            // ลบเมนูนี้ออกจากตะกร้า
            unset($cart[$menuId]);

            // อัพเดต session ด้วยตะกร้าใหม่
            session()->put('cart', $cart);
        }

        // หากตะกร้าสินค้าหมดแล้ว ลบข้อมูลทั้งหมดใน session
        if (empty($cart)) {
            session()->forget('cart');
        }

        return redirect()->route('cart.view')->with('success', 'เมนูถูกลบออกจากตะกร้าแล้ว');
    }

    // ฟังก์ชันสำหรับเก็บข้อมูลเมนูในตะกร้า
    public function store(Request $request)
    {
        $menu_id = $request->input('menu_id'); // เปลี่ยนจาก product_id เป็น menu_id
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // ดึงข้อมูลเมนูจากฐานข้อมูล
        $menu = Menu::find($menu_id);
        if (!$menu) {
            return redirect()->back()->with('error', 'ไม่พบเมนูที่เลือก');
        }

        // เอาข้อมูลเมนูเข้าในตะกร้า
        $cart = session()->get('cart', []);

        if (isset($cart[$menu_id])) {
            // ถ้ามีเมนูซ้ำในตะกร้า, เพิ่มจำนวน
            $cart[$menu_id]['quantity'] += $quantity;
        } else {
            // ถ้ายังไม่มีเมนูนั้นในตะกร้า, เพิ่มเข้าไปใหม่
            $cart[$menu_id] = [
                'quantity' => $quantity,
                'price' => $price,
                'menu_id' => $menu_id, // เปลี่ยนจาก product_id เป็น menu_id
                'name' => $menu->name,        // เพิ่มชื่อเมนู
                'image_url' => $menu->image,   // เพิ่ม URL ของรูปภาพเมนู
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('category.index')->with('success', 'เมนูถูกเพิ่มลงในตะกร้าแล้ว');
    }

    // ฟังก์ชันสำหรับแสดงข้อมูลตะกร้า
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // ฟังก์ชันลบเมนูออกจากตะกร้า
    public function remove($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);

            session()->put('cart', $cart);

            return back()->with('success', 'เมนูถูกลบออกจากตะกร้าแล้ว');
        }

        return back()->with('error', 'ไม่พบเมนูที่ต้องการลบ');
    }
}
