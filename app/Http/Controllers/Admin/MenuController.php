<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.menu.index', compact('menu'));
    }

    public function create()
    {
        $category = Category::paginate(5);
        return view('backend.menu.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required|max:255',
                'description' => 'required',
                'category_id'=> 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => 'Enter the menu name',
                'name.max' => 'Enter name limited to 255 characters',
                'price.required' => 'Enter Price for the menu',
                'price.max' => 'Enter price limited to 255 characters',
                'description.required' => 'Enter the menu details',
                'category_id.required' => 'Select category',
                'image.mimes' => 'Only .jpg, .jpeg, .png images are allowed',
            ]
        );

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = intval($request->price);
        $menu->description = $request->description;
        $menu->category_id = intval($request->category_id);
        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/menu/', $filename);
            Image::make(public_path() . '/backend/menu/' . $filename)->resize(200, 200)->save(public_path() . '/backend/menu/resize/' . $filename);
            $menu->image = $filename;
        } else {
            $menu->image = "no_image.jpg";
        }
        $menu->save();
        alert()->success('Save successfully', 'Successfully saved');
        return redirect('admin/menu/index');
    }

    public function edit($menu_id)
    {
        $menu = Menu::find($menu_id);
        $cat = Category::all();
        return view('backend.menu.edit', compact('menu', 'cat'));
    }

    public function update(Request $request, $menu_id)
    {
        $menu = Menu::find($menu_id);
        $menu->name = $request->name;
        $menu->price = intval($request->price);
        $menu->description = $request->description;
        $menu->category_id = intval($request->category_id);
        if ($request->hasFile('image')) {
            if ($menu->image != 'no_image.jpg') {
                File::delete(public_path() . '/backend/menu/' . $menu->image);
                File::delete(public_path() . '/backend/menu/resize/' . $menu->image);
            }
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/backend/menu/', $filename);
            Image::make(public_path() . '/backend/menu/' . $filename)->resize(200, 200)->save(public_path() . '/backend/menu/resize/' . $filename);
            $menu->image = $filename;
        }
        $menu->save();
        alert()->success('Update successfully', 'Successfully updated');
        return redirect('admin/menu/index');
    }

    public function delete($menu_id)
    {
        $menu = Menu::find($menu_id);
        if ($menu->image != 'no_image.jpg') {
            File::delete(public_path() . '/backend/menu/' . $menu->image);
            File::delete(public_path() . '/backend/menu/resize/' . $menu->image);
        }
        $menu->delete();
        alert()->success('Deleted successfully', 'This data has been deleted');
        return redirect('admin/menu/index');
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        // ส่งข้อมูลความสัมพันธ์ในรูปแบบที่เหมาะสม
        return $menu->category->toArray(); // หรือ
        return response()->json($menu->category);
    }
}
