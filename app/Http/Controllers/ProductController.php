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
        // $products = Product::all();
        // return $products;
        return Product::all();
       
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
//         $product = new Product();
//  $product->name = $request->input('name');
//  $product->price = $request->input('price');
//  $product->description = $request->input('description');
//  $product->save();
//  return $product;
$request->validate([
    'name' => 'required',
    'description' => 'required',
    'price' => 'required'
    ]);
    return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//         $product = Product::findOrFail($id);
//  return $product;
return Product::find($id);
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
//         $product = Product::findOrFail($id);
//  $product->name = $request->input('name');
//  $product->price = $request->input('price');
//  $product->save();
//  return $product;
$product = Product::find($id);
$product->update($request->all());
return $product;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!is_null($product)){
            $product->delete();
        return $product;
        }
        else return "Nie istnieje w bazie obiekt o podanym id=$id";
        
        
    }


public function search($name)
{
 return Product::where('name', 'like', '%'.$name.'%')->get();
}
}