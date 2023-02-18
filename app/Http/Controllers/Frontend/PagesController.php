<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
use Image;
use File;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newArrival = Product::orderBy('id','desc')->get();
        $featured   = Product::orderBy('id','desc')->where('featured_item', 1)->get();
        //return view('frontend.pages.home',compact('newArrival'));
        return view('frontend.pages.home', compact('newArrival', 'featured'));
    }

    // all product page
    public function products()
    {
        //$products = Product::orderBy('id','desc')->get();
        $products = Product::orderBy('id','desc')->paginate(12);
        return view('frontend.pages.products.products', compact('products'));
    }
    // single product details show
    public function productshow($slug)
    {
        $value = Product::where('slug', $slug)->first();

        if(!is_null($value)){
            return view('frontend.pages.products.details', compact('value'));
        }else{
            return back();
        } 
        
    }


    // Category wise all product page
    public function productcategory()
    {
        return view('frontend.pages.products.products');
    }
    // single category product details show
    public function categoryshow($slug)
    {

        $category = Category::where('slug', $slug)->first();
        if(!is_null($category)){
            return view('frontend.pages.products.category', compact('category'));
        }else{
            return redirect()->route('homepage');
        }
        
    }



    public function login()
    {
        return view('frontend.pages.login');
    }

    public function registration()
    {
        return view('frontend.pages.registration');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
