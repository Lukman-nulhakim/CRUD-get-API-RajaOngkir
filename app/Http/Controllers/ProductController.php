<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        
        Product::create($validatedData);
        return redirect()->route('products.index')->with('pesan', "Product $request->product_name berhasil ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        // ini penulisan find
        $categories = Category::all();
        $product = Product::find($product);
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $product->update($validatedData);
        return redirect()->route('products.index')->with('pesan', "Ubah produk {$validatedData ['product_name']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        // ini penulisan where
        $product = Product::where('id', $product)->first();
        $product->delete();
        return redirect()->route('products.index')->with('pesan', "Produk $product->product_name berhasil di hapus");
    }
}
