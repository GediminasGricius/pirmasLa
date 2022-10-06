<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function display($name,Request $request){
        $file=storage_path('app/'.$name);
        return response()->file( $file );
    }

    public function productImage($producId){
        $product=Product::find($producId);
        $file=storage_path('app/products/'.$product->img);
        return response()->file( $file );
    }
}
