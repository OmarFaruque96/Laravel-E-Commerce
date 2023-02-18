<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use Illuminate\Support\Str;
use Image;
use File;


class BrandController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderby('name', 'asc')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|max: 225'],
            ['name.required' => 'Please Insert the Brand Name']
        );

        $brand =  new Brand();  // create an object

        // call db col and put all data into the variable
        $brand->name        = $request->name;
        $brand->slug        = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_featured = $request->is_featured;
        $brand->status      = $request->status;

        // for image
        if($request->image){
            $image          = $request -> file('image');
            $img            = rand().'.'.$image->getClientOriginalExtension();
            $location       = public_path('Backend/img/brand/' . $img);

            Image::make($image)->save($location);

            // save name in database
            $brand->image   = $img;
        }

        // save all the data into the database
        $brand->save();

        return redirect()->route('brand.manage');

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
        $brand = Brand::find($id);

        if(!is_null($brand)){
            return view('backend.pages.brand.edit', compact('brand'));
        }
        else{
            return redirect()->route('brand.manage');
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
        $request->validate(
            ['name' => 'required|max: 225'],
            ['name.required' => 'Please Insert the Brand Name']
        );

        $brand = Brand::find($id);  

        // call db col and put all data into the variable
        $brand->name        = $request->name;
        $brand->slug        = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_featured = $request->is_featured;
        $brand->status      = $request->status;

        // for image
        if(!is_null($request->image)){

            // if file exists then delete first
            if(File::exists('Backend/img/brand/' . $brand->image)){
                File::delete('Backend/img/brand/' . $brand->image);
            }

            $image          = $request -> file('image');
            $img            = rand().'.'.$image->getClientOriginalExtension();
            $location       = public_path('Backend/img/brand/' . $img);

            Image::make($image)->save($location);

            // save name in database
            $brand->image   = $img;
        }

        // save all the data into the database
        $brand->save();

        return redirect()->route('brand.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if(!is_null($brand)){

            // if file exists then delete first
            if(File::exists('Backend/img/brand/' . $brand->image)){
                File::delete('Backend/img/brand/' . $brand->image);
            }
            $brand->delete();
            return redirect()->route('brand.manage');

        }else{
            return redirect()->route('brand.manage');
        }
    }
}
