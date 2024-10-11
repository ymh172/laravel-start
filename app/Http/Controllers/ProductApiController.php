<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
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
        // return $request->images;
        $images = [];
        if ($request->images) {
            foreach ($request->images as $file) {
                $newName = "product_" . uniqid() . "." . $file->extension();
                $images[] = $newName;
                $file->storeAs('public/productImages', $newName);
            }
            // return $images;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->images = json_encode($images);
        $product->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $images = [];
        if ($request->images) {
            foreach ($request->images as $file) {
                $newName = "product_" . uniqid() . "." . $file->extension();
                $images[] = $newName;
                $file->storeAs('public/productImages', $newName);
            }
            // return $images;
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->images = json_encode($images);
        $product->save();

        return response()->json([
            "message" => "success update"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $images = json_decode($product->images);
        if ($images) {
            foreach ($images as $image) {
                Storage::delete('public/productImages/' . $image);
            }
        }
        $product->delete();
        return response()->json([
            "message" => "success"
        ]);
    }
}
