<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class QueriesController extends Controller
{
    public function get() {
        $products = Product::all();
        return response()->json($products);
    }

    public function getById(int $id) {

        $product = Product::find($id);

        if(!$product) {
            return response()->json([
               "message" => "Producto no encontrado."
            ],Response::HTTP_NOT_FOUND);
        }

        return response()->json($product);

    }


    public function getNames() {

        $products = Product::select('name')
            ->orderBy('name', "desc")
            ->get();

        return response()->json($products);
    }

    public function searchNames(string $name, float $price) {
        $product = Product::where('name', $name)
            ->where("price",">",$price)
            ->orderBy("name")
            ->select("name","description")
            ->get();

            return response()->json($product);
    }

    public function searchString(string $value) {
        $product = Product::where("description","like","%{$value}%")
            ->get();
        return response()->json($product);
    }

    public function searchStringOr(string $value) {
        $product = Product::where("description","like","%{$value}%")
            ->orWhere('name', "like", "%{$value}%")
            ->get();
        return response()->json($product);
    }

    public function advancedSearch(Request $request) {
        $products = Product::where( function($query) use($request)  {
            if($request->input("name")){
                $query->where('name', "like", "%{$request->input("name")}%");
            }
        })
        ->where( function($query) use($request)  {
            if($request->input("description")){
                $query->where('description', "like", "%{$request->input("description")}%");
            }
        })
        ->where( function($query) use($request)  {
            if($request->input("price")){
                $query->where('price', ">", $request->input("description"));
            }
        })
        ->get();

    return response()->json($products);

    }


    public function searchJoin() {
        $products = Product::join("category","product.category_id","=","category.id")
            ->select("product.*","category.name as category")
            ->get();

        return response()->json($products);
    }

    public function searchGroupBy() {
        $products = Product::join("category","product.category_id","=","category.id")
            ->select("category.id","category.name",DB::raw("COUNT(product.id) as total"))
            ->groupBy("category.id","category.name")
            ->get();

        return response()->json($products);
    }

}
