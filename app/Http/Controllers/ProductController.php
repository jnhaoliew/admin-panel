<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){
        $data = Product::all();
        return view('product.product-list', ['products' => $data]);
    }

    public function addProduct(){
        return view('product.product-add');
    }

    public function saveProduct(Request $request){
        Product::create([
            'product_name' => $request->prod_name,
            'product_desc' => $request->prod_desc,
            'product_price' => $request->prod_price,
        ]);
        return back();
    }

    public function editProduct($id){
        $product = Product::where('id', $id)->first();
        return view('product.product-edit', compact('product'));
    }

    public function updateProduct(Request $request){
        $product = Product::find($request->id);
        $product->update([
            'product_name' => $request->prod_name,
            'product_desc' => $request->prod_desc,
            'product_price' => $request->prod_price,
        ]);
        return $this->productList();
    }

    public function deleteProduct($id){
        Product::find($id)->delete();
        return back();
    }
}
