<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(3);
        return view('user.shop.index',compact('products'));
    }

    public function getCategories()
    {
        $categories=Category::all();
        return view('user.categories.index',compact('categories'));
    }

    public function show(string $id)
    {
        $products=Product::find($id);
        return view("user.shop.show",compact('products'));
    }
    public function getProductsByCategory(string $id)
    {
        $products=Category::find($id)->products()->paginate(4);
        return view('user.shop.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function getProductsByName(Request $request)
    {
        $products = Product::where('product_name', 'like', "%$request->q%")->paginate(2);
        if ($request->q == '') {
            return redirect()->route("shops.index");
        }
        return view ("user.shop.index",["products"=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
