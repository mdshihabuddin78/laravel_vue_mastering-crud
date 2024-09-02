<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $data = SubCategory::get();
        return response()->json(['result' => $data, 'status' => 2000], 200);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Create a new SubCategory
            $category = new SubCategory();
            $category->name = $validated['name'];
            $category->save();

            return response()->json(['status' => 2000, 'message' => 'SubCategory created successfully']);
        } catch (\Exception $e) {
            \Log::error('Error creating SubCategory: '.$e->getMessage());

            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function sho($subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
