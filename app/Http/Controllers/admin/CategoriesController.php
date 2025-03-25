<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        $categories=Category::where('parent',0)->get();

        return view('admin.add_category')->with('allCategories',$categories);
    }
    public function index() {
        $categories=Category::get();
        return view('admin.view_categories')->with('category',$categories);
    }

    public function destroy($id) {
        $category=Category::find($id);
        if($category->delete())
        return redirect()->route('view_categories');
    }
    public function edit($id) {
        $category=Category::find($id);
        $categories=Category::where('parent',0)->get();
        return view('admin.edit_category')->with('category',$category)->with('allCategories',$categories);
    }
    public function store(Request $requset) {
        $category=new Category();
        $category->name=$requset->category_name;
        $category->description=$requset->category_description;
        $category->parent=$requset->category_parent;
        $category->status=$requset->category_status;
        if($category->save())
      return  redirect()->route('view_categories');
    }
}
