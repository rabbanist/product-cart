<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProductCategory::create($request->all());
        return redirect()->route('admin.product-category.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategory::findOrfail($id);
        if (!$category) {
            return redirect()->route('admin.product-category.index');
        }
        return view('admin.category.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = ProductCategory::findOrfail($id);
        if (!$category) {
            return redirect()->route('admin.product-category.index');
        }
        $category->update($request->all());
        return redirect()->route('admin.product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategory::findOrfail($id);
        if (!$category) {
            return redirect()->route('admin.product-category.index');
        }
        $category->delete();
        return redirect()->route('admin.product-category.index');
    }
}
