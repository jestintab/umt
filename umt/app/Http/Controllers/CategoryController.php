<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Input;
use Redirect;
use Validator;

class CategoryController extends Controller
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
        return view('categories.index')
                ->with('categories', Category::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postCreate()
    {
        //
        $validator = validator::make(Input::all(), Category::$rules);

        if($validator-> passes()){
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();
            return Redirect::to('admin/categories/index')
                    ->with('message', 'Category Created');
        }
        return Redirect::to('admin/categories/index')
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
        $category = Category::find(Input::get('id'));

        if($category){
            $category->delete();
            return Redirect::to('admin/categories/index')
                    ->with('message', 'Category Deleted');

        }
        return Redirect::to('admin/categories/index')
                    ->with('message', 'Something went to wrong. Please try again!');


    }
}
