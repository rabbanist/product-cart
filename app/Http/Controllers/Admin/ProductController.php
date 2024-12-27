<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequestStore;
use App\Http\Requests\Product\ProductRequestUpdate;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequestStore $request)
    {
        $validated = $request->validated();
        //image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $validated['image'] = $image_name;
        }
        Product::create($validated);
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequestUpdate $request, string $id)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $product = Product::findOrFail($id);
            $old_image = public_path('images') . '/' . $product->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $validated['image'] = $image_name;
        }
        Product::findOrFail($id)->update($validated);
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $image = public_path('images') . '/' . $product->image;
        if (file_exists($image)) {
            unlink($image);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
    }
}
