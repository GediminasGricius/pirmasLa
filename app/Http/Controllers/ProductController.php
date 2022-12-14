<?php

namespace App\Http\Controllers;

use App\Events\NewProductEvent;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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

        $user=User::find($request->user()->id);
       // dd($user->products);

        //$products= Product::with(['category','category.user'])->where('price','>',10)->get();
        $products= Product::with(['category','category.user'])->get();

        //$products= $products->where('price','>',10);
        // dd($products);
        //rejson_encode($products)
        return view("products.index",['products'=>$products, 'user'=>$user]);
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
            'name.*'=>'Vardas yra privalomas, ne trumpesnis nei 3 simboliai ir ne ilgesnis nei 16 simboli??, turi b??ti sudarytas tik i?? skai??i?? ir raid??i?? be tarp??',
        ]);

        /*
            'name.required'=>'J??s?? vardas privalo b??ti pateiktas',
            'name.unique'=>'Prek?? tokiu pavadinimu jau egzistuoja',
            'name.min'=>'Prek??s pavadinimas turi b??ti ne trumpesnis nei 3 simboliai',
            'name.alpha_num'=>'Pavadinim?? turi sudaryti tik raid??s ir skai??iai, be tarp??',

            'price.required'=>'Prek??s kaina privalo b??ti nurodyta'

        ]); */
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->save();

        event(new NewProductEvent($product));


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

    public function categoryProducts($category_id){
        $category=Category::with('products')->where('id',$category_id)->first();
        $products=Product::where('category_id',$category_id)->orderBy('price')->get();
        return view('products.category', ['category'=>$category, 'products'=>$products]);
    }
}
