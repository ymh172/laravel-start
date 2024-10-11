<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")->paginate(5);
        // return $products;
        return view('product.index', compact('products'));
    }
    public function index()
    {
        $products = Product::paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Single File Upload
        // if ($request->image) {
        //     $file = $request->image;
        //     $newName = "producID_" . uniqid() . "." . $file->extension();

        //     $file->storeAs('public/productImages', $newName);
        // }

        //Multiple File Upload
        $images =[];
        if($request->images){
            foreach($request->images as $file){
                $newName = "producID_" . uniqid() . "." . $file->extension();
                $images[] = $newName;
                $file->storeAs('public/productImages', $newName);
            }
        }

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->images =json_encode($images);
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->save();

        // return view('product.index',compact('product'));

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        if($request->image){
            $file = $request->image;
            $newName = "producID_" . uniqid() . "." . $file->extension();
            $file->storeAs('public/productImages', $newName);
            $product->image = $newName;
        }
        $product->update();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
