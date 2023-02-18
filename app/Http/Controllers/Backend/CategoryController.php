<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Backend\Category;
use Illuminate\Support\Str;
use Image; 
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('name', 'asc')->get();
        // $categories = Category::orderby('name', 'asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
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
            ['name' => 'required | max:225'],
            ['name.required' => 'Please insert the Category Name'],
        );

        $category = new Category();

        $category->name         = $request->name;
        $category->slug         = Str::slug($request->name);
        $category->description  = $request->description;
        $category->is_parent    = $request->is_parent;
        $category->status       = $request->status;

        // for image
        if($request->image){
            $image_name     = $request->file('image');
            $update_name    = rand().'.'.$image_name->getClientOriginalExtension();
            $location       = public_path('Backend/img/category/'.$update_name); 

            Image::make($image_name)->save($location);

            $category->image = $update_name;
        }

        $category->save();

        return redirect()->route('category.manage');

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

        $parentCat = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();

        $category = Category::find($id);
        if(!is_null($category)){
            return view('backend.pages.category.edit', compact('category', 'parentCat'));
        }
        else{
            return view('backend.pages.category.manage');
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
            ['name'             => 'required | max:225'],
            ['name.required'    => 'Please insert the Category Name'],
        );

        $category = Category::find($id);

        $category->name         = $request->name;
        $category->slug         = Str::slug($request->name);
        $category->description  = $request->description;
        $category->is_parent    = $request->is_parent;
        $category->status       = $request->status;

        // for image

        if(!is_null($request->image)){

            // delete existing image
            if(File::exists('Backend/img/category/' . $category->image)){
                File::delete('Backend/img/category/' . $category->image);
            }

            $image_name     = $request->file('image');
            $update_name    = rand().'.'.$image_name->getClientOriginalExtension();
            $location       = public_path('Backend/img/category/'.$update_name); 

            Image::make($image_name)->save($location);

            $category->image = $update_name;

        }

        $category->save();

        return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!is_null($category)){

            // if file exists then delete first
            if(File::exists('Backend/img/category/' . $category->image)){
                File::delete('Backend/img/category/' . $category->image);
            }
            $category->delete();
            return redirect()->route('category.manage');

        }else{
            return redirect()->route('category.manage');
        }
    }
}
