<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $data=SubCategory::get();
        return response()->json(['result'=>$data,'status'=>2000],200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(subCategory $subCategory)
    {
        //
    }


    public function edit(subCategory $subCategory)
    {
        //
    }


    public function update(Request $request, subCategory $subCategory)
    {
        //
    }


    public function destroy(subCategory $subCategory)
    {
        //
    }
}