<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Support\Str;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function promotion()
    {
        return view('page.promotion');
    }

    public function index()
    {
        $promotion = Promotion::orderBy('promotion_id','desc')->Paginate(5);
        return view('backend.promotion.index', compact('promotion'));
    }

    public function create()
    {
        return view('backend.promotion.create');
    }

    public function insert(Request $request)
    {
        // ป้องกันการกรอกข้อมูลผ่าน Form
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => 'Enter name image',
                'image.mimes' =>'Only .jpg, .jpeg, .png images are allowed',
            ]
        );

        $promotion = new Promotion();
        $promotion->name = $request->name;

        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

            // ตรวจสอบและสร้างโฟลเดอร์หากไม่มี
            if (!File::exists(public_path('backend/promotion/resize'))) {
                File::makeDirectory(public_path('backend/promotion/resize'), 0777, true);
            }

            // ย้ายไฟล์ภาพไปยังโฟลเดอร์ที่ต้องการ
            $request->file('image')->move(public_path() . '/backend/promotion/', $filename);

            // ใช้ Intervention Image เพื่อ resize และบันทึกภาพ
            try {
                Image::make(public_path() . '/backend/promotion/' . $filename)
                    ->resize(80, 80)
                    ->save(public_path() . '/backend/promotion/resize/' . $filename);
            } catch (\Exception $e) {
                \Log::error('Image resize error: ' . $e->getMessage());
            }

            $promotion->image = $filename;
        } else {
            $promotion->image = 'no_image.jpg';
        }

        $promotion->save();
        alert()->success('Save successfully', 'Successfully saved');
        return redirect('admin/promotion/index');
    }


    public function edit($promotion_id)
    {
        $promotion = Promotion::find($promotion_id);
        return view('backend.promotion.edit', compact('promotion'));
    }

    public function update(Request $request, $promotion_id)
    {
        //ป้องกันการกรอกข้อมูลผ่านForm
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => 'Enter name image',
                'image.mimes' =>'Only .jpg, .jpeg, .png images are allowed',
            ]
        );

        $promotion = promotion::find($promotion_id);
        $promotion->name = $request->name;
        if ($request->hasFile('image')) {

            if ($promotion->image != 'no_image.jpg') {
                File::delete(public_path() . '/backend/promotion/' . $promotion->image);
                File::delete(public_path() . '/backend/promotion/resize/' . $promotion->image);
            }

            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/backend/promotion/', $filename);

            Image::make(public_path() . '/backend/promotion/' . $filename)->resize(80, 80)->save(public_path() . '/backend/promotion/resize/' . $filename);

            $promotion->image = $filename;
        }
        $promotion->update();
        alert()->success('Update successfully', 'Successfully updated');
        return redirect('admin/promotion/index');
    }

    public function delete($promotion_id)
    {
        $promotion = Promotion::find($promotion_id);
        if ($promotion->image != 'no_image.jpg') {
            File::delete(public_path() . '/backend/promotion/' . $promotion->image);
            File::delete(public_path() . '/backend/promotion/resize/' . $promotion->image);
        }
        $promotion->delete();
        alert()->success('Deleted successfully', 'This data has been deleted');
        return redirect('admin/promotion/index');
    }
}
