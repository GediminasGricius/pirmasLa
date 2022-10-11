<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products= Product::all();
        return view("products.index",['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $categories=Category::all();
        return view('products.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $validation=Validator::make($request->all(), [
            'name'=>['required','alpha_num','min:3', 'max:16','unique:App\Models\Product,name'],
            'price'=>['required']
        ]);
        if ($validation->fails()){
            dd("Blogai");
        }
        */




        $request->validate([
            'name'=>['required','min:3','unique:App\Models\Product,name'], //  'required|min:3
            'price'=>['required']
        ],[
            'name.*'=>'Vardas yra privalomas, ne trumpesnis nei 3 simboliai ir ne ilgesnis nei 16 simbolių, turi būti sudarytas tik iš skaičių ir raidžių be tarpų',
        ]);

        /*
            'name.required'=>'Jūsų vardas privalo būti pateiktas',
            'name.unique'=>'Prekė tokiu pavadinimu jau egzistuoja',
            'name.min'=>'Prekės pavadinimas turi būti ne trumpesnis nei 3 simboliai',
            'name.alpha_num'=>'Pavadinimą turi sudaryti tik raidės ir skaičiai, be tarpų',

            'price.required'=>'Prekės kaina privalo būti nurodyta'

        ]); */
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        echo "rodyti viena";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {

        $categories=Category::all();
        return view('products.update', ['product'=>$product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if (Gate::allows('edit')) {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $img = $request->file('image');
            $filname = $product->id . '.' . $img->extension();

            $product->img = $filname;
            $img->storeAs('products', $filname);
            $product->save();
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }



    public function rodykProduktus(){
       $products= Product::all();
       return view("products",['products'=>$products]);

    }
}
