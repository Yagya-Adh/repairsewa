<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  Product::all();

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Product::create([
        'name'=>$request->name, 
        ]);

        return redirect()->route('product.index')->with('success','User is created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id );

        return view('products.show',compact('product'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::find($id);

        return view('products.edit',compact('product'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required', 
        ]);

        $product = Product::find($id);
        $product->name = $request->name; 
        $product->save();

        return redirect()->route('users.index')->with('success','User is updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found!');
        }
    
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product has been deleted!');
    }
    
}