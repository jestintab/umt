<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use DB;
use Input;
use Redirect;
use Validator;
use Image;
use File;

class ProductController extends Controller
{
    public function __construct(){
        $this->beforeFilter('csrf',array('on' => 'post' ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        $categories =array();
        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return view('products.index')
                ->with('products', Product::get())
                ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postCreate()
    {
        //
        $validator = validator::make(Input::all(), Product::$rules);

        if($validator-> passes()){
            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');

            $image= Input::file('image');
            $filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(468,249)->save('images/products/'.$filename);
            $product->image = 'images/products/'.$filename;
            $product->save();

            $product->save();
            return Redirect::to('admin/products/index')
                    ->with('message', 'Product Created');
        }
        return Redirect::to('admin/products/index')
                    ->with('message', 'Something went wrong')
                    ->withErrors($validator)
                    ->withInput();
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postDelete()
    {
        //
        $product = Product::find(Input::get('id'));

        if($product){
            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                    ->with('message', 'Product Deleted');

        }
        return Redirect::to('admin/products/index')
                    ->with('message', 'Something went to wrong. Please try again!');


    }

    public function postToggleavailiablity(){
        $product = Product::find(Input::get('id'));

        if($product){

            $product->availability = Input::get('availability');
            $product->save();
            return Redirect::to('admin/products/index')
                    ->with('message',' Product Updated');
        }

        return Redirect::to('admin/products/index')->with('message','Invalid Product');
    }
}
