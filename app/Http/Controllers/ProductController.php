<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(4);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'product_name'=> 'required|min:3|max:25',
            'Description'=>'required |min:20',
            'product_price'=>'required|numeric',
            'product_image'=>'mimes:jpg,png,jpeg,webp,bmp'
        ]);

        // change image name
        $image_extension=$request->product_image->extension();
        $image_name=time() . '.' .$image_extension ;
        // store image in the storage folder

        Storage::Put("/public/product_image/$image_name",file_get_contents($request->product_image));

       Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->Description,
            'price'=>$request->product_price,
            'image'=> $image_name,
            'category_id'=>$request->category_id,

        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $product=Product::find($id);
        return view('admin.products.edit',['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'product_name'=> 'required|min:3|max:25',
            'Description'=>'required |min:20',
            'product_price'=>'required|numeric',
            'product_image'=>'mimes:jpg,png,jpeg,webp,bmp'
        ]);

        $Product=Product::find($id);
        // store image in the storage folder

            // change image name
            $image_extension=$request->product_image->extension();
            $image_name=time() . '.' .$image_extension ;

            if (Storage::exists("/public/product_image/$Product->image")) {
                Storage::delete("/public/product_image/$Product->image");
                Storage::Put("/public/product_image/$image_name", file_get_contents($request->product_image));

            }
                Storage::Put("/public/product_image/$image_name", file_get_contents($request->product_image));


            Product::whereid($id)->update([
                'product_name'=>$request->product_name,
                'description'=>$request->Description,
                'price'=>$request->product_price,
                'image'=> $image_name,
                'category_id'=>$request->category_id,

            ]);




        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        Storage::delete("/public/product_image/$product->image");
        $product->delete();
        return redirect()->route('products.index');
    }
}
