<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    public function create()
    {
        return view("products.create");
    }

    public function store(Request $req)
    {
        $this->validate($req, Product::$rules);
        $product = new Product();
        $product->fill($req->except("_token"));
        $upload_info = Storage::disk('s3')->putFile(env("AWS_DIRECTORY", "production"), $req->file('image'), 'public');
        $product->path = Storage::disk("s3")->url($upload_info);
        $product->save();
        return redirect()->route("products");
    }

}
