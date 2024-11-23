<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = category::orderBy('category_id','desc')->Paginate(5);
        return view('backend.category.index',compact('category'));
    }
    public function create(){
        return view('backend.category.create');
    }
    public function insert(request $request){

        //ทำการป้องกันการกรอกข้อมูลผ่านฟอร์ม
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ],
        [
            'name.required' => 'Enter category name',
            'name.unique' => 'This name already exists in the database',
            'name.max' => ' Enter limited to 255 characters',
        ]);

        // dd(request->name);

        //การบันทึกข้อมูลลงในฐานข็อมูล
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        alert()->success('Save successfully', 'Successfully saved');
        return redirect()->route('admin.c.index');
    }

    public function edit($category_id){
        $cat = Category::find($category_id);
        return view('backend.category.edit',compact('cat'));
    }

    public function update(Request $request,$category_id){
        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->update();
        alert()->success('Update successfully', 'Successfully updated');
        return redirect()->route('admin.c.index');
}

    public function delete($category_id){
        $category = Category::find($category_id);
        $category->delete();
        alert()->success('Deleted successfully','The data has been successfully deleted');
        return redirect()->route('admin.c.index');
    }
}
