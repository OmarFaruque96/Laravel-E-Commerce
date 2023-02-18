<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
use Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('title','asc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     ['name' => 'required|max: 225'],
        //     ['name.required' => 'Please Insert the Brand Name']
        // );

        $product =  new Product();  // create an object

        // call db col and put all data into the variable
        $product->title         = $request->title;
        $product->slug          = Str::slug($request->title);
        $product->regular_price = $request->regular_price;
        $product->offer_price   = $request->offer_price;
        $product->sku_code      = $request->sku_code;
        $product->quantity      = $request->quantity;
        $product->tags          = $request->tags;
        $product->featured_item = $request->featured_item;
        $product->brand_id      = $request->brand_id;
        $product->category_id   = $request->category_id;
        $product->status        = $request->status;
        $product->product_type  = $request->product_type;
        $product->desc          = $request->desc;
        $product->short_desc    = $request->short_desc;


        // for image
        if($request->image){
            $image          = $request -> file('image');
            $img            = rand().'.'.$image->getClientOriginalExtension();
            $location       = public_path('Backend/img/product/' . $img);

            Image::make($image)->save($location);

            // save name in database
            $product->image   = $img;
        }

        // save all the data into the database
        $product->save();

        return redirect()->route('product.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if(!is_null($product)){
            return view('backend.pages.product.edit', compact('product'));
        }
        else{
            return redirect()->route('product.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);  // create an object

        // call db col and put all data into the variable
        $product->title         = $request->title;
        $product->slug          = Str::slug($request->title);
        $product->regular_price = $request->regular_price;
        $product->offer_price   = $request->offer_price;
        $product->sku_code      = $request->sku_code;
        $product->quantity      = $request->quantity;
        $product->tags          = $request->tags;
        $product->featured_item = $request->featured_item;
        $product->brand_id      = $request->brand_id;
        $product->category_id   = $request->category_id;
        $product->status        = $request->status;
        $product->product_type  = $request->product_type;
        $product->desc          = $request->desc;
        $product->short_desc    = $request->short_desc;


        if(!is_null($product->image)){
            // if file exists then delete first
            if(File::exists('Backend/img/product/' . $product->image)){
                File::delete('Backend/img/product/' . $product->image);
            }

            $image          = $request -> file('image');
            $img            = rand().'.'.$image->getClientOriginalExtension();
            $location       = public_path('Backend/img/product/' . $img);

            Image::make($image)->save($location);

            // save name in database
            $product->image   = $img;


        }
        // save all the data into the database
        $product->save();

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!is_null($product)){

            // if file exists then delete first
            if(File::exists('Backend/img/product/' . $product->image)){
                File::delete('Backend/img/product/' . $product->image);
            }

            $product->delete();
            return redirect()->route('product.manage');

        }else{
            return redirect()->route('product.manage');
        }
    }
} 
