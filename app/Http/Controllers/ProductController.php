<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $req)
    {
        $product = new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->file_path = $req->file('file-name')->store('products');
        $product->save();

        return $product;

        // return $req->input(); //to check how many data we are getting from this request

        // return $req->file('file-name')->store('products');
    }
}
