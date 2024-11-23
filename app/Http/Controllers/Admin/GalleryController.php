<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Str;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        return view('page.gallery');
    }

    public function index()
    {
        $gallery = Gallery::orderBy('gallery_id','desc')->Paginate(5);
        return view('backend.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('backend.gallery.create');
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

        $gall = new Gallery();
        $gall->name = $request->name;

        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

            // ตรวจสอบและสร้างโฟลเดอร์หากไม่มี
            if (!File::exists(public_path('backend/gallery/resize'))) {
                File::makeDirectory(public_path('backend/gallery/resize'), 0777, true);
            }

            // ย้ายไฟล์ภาพไปยังโฟลเดอร์ที่ต้องการ
            $request->file('image')->move(public_path() . '/backend/gallery/', $filename);

            // ใช้ Intervention Image เพื่อ resize และบันทึกภาพ
            try {
                Image::make(public_path() . '/backend/gallery/' . $filename)
                    ->resize(80, 80)
                    ->save(public_path() . '/backend/gallery/resize/' . $filename);
            } catch (\Exception $e) {
                \Log::error('Image resize error: ' . $e->getMessage());
            }

            $gall->image = $filename;
        } else {
            $gall->image = 'no_image.jpg';
        }

        $gall->save();
        alert()->success('Save successfully', 'Successfully saved');
        return redirect('admin/gallery/index');
    }


    public function edit($gallery_id)
    {
        $gall = Gallery::find($gallery_id);
        return view('backend.gallery.edit', compact('gall'));
    }

    public function update(Request $request, $gallery_id)
    {
        //ป้องกันการกรอกข้อมูลผ่านForm
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => 'Enter name image',
                'image.mimes' =>'Only .jpg, .jpeg, .png images are allowed',
            ]
        );

        $gall = Gallery::find($gallery_id);
        $gall->name = $request->name;
        if ($request->hasFile('image')) {

            if ($gall->image != 'no_image.jpg') {
                File::delete(public_path() . '/backend/gallery/' . $gall->image);
                File::delete(public_path() . '/backend/gallery/resize/' . $gall->image);
            }

            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/backend/gallery/', $filename);

            Image::make(public_path() . '/backend/gallery/' . $filename)->resize(80, 80)->save(public_path() . '/backend/gallery/resize/' . $filename);

            $gall->image = $filename;
        }
        $gall->update();
        alert()->success('Update successfully', 'Successfully updated');
        return redirect('admin/gallery/index');
    }

    public function delete($gallery_id)
    {
        $gall = Gallery::find($gallery_id);
        if ($gall->image != 'no_image.jpg') {
            File::delete(public_path() . '/backend/gallery/' . $gall->image);
            File::delete(public_path() . '/backend/gallery/resize/' . $gall->image);
        }
        $gall->delete();
        alert()->success('Deleted successfully', 'This data has been deleted');
        return redirect('admin/gallery/index');
    }
}
