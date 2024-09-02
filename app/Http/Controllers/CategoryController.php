<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::get();
        return response()->json(['result' => $data, 'status' => 2000], 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            return response()->json(['status' => 2000]);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }


    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {

        try {
            $id = $request->input('id');

            $category =Category::where('id', $id)->first();

            if ($category) {
                $category->name = $request->input('name');
                $category->update();

                return response()->json(['status' => 2000]);
            }

            return response()->json(['status' => 3000]);
        } catch (\Exception $e) {
            return response()->json(['result' => null, 'message' => $e->getMessage(), 'status' => 5000]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found!'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully!'
        ]);
    }
}
