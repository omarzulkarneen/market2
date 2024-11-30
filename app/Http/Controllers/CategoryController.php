<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2|max:15'
        ]);

        Category::create([
            'category_name'=>$request->name
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($product_id)
    {
        $element=Category::find($product_id);
        $element->delete();
        return redirect()->route("categories.index");
    }

    public function edit($product_id)
    {
        $element=Category::find($product_id);
        return view("admin.categories.edit" , compact('element'));
    }
    public function update($product_id)
    {
        $name = request()->name;

        //2- update the submitted data in database
        //select or find the post
        //update the post data
        $singlePostFromDB = Category::find($product_id);
        $singlePostFromDB->update([
            'category_name' => $name,
        ]);
        return redirect()->route('categories.index');
    }
}

