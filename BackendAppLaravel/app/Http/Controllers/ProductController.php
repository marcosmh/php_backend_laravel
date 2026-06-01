<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request) {
        $perPage = $request->query("per_page",10);
        $page = $request->query("page",0);
        $offset = $page * $perPage;

        $products = Product::skip($offset)->take($perPage)->get();

        // return response()->json(Product::all());

        return response()->json($products);
    }

    public function store(Request $request) {
        $product = Product::create($request->all());

        return response()->json($product);
    }
}
