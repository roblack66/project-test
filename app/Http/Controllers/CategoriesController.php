<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('created_at', 'DESC')->get();

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Categories::create($validatedData);

        return response()->json($category, 201);
    }

    public function update(Request $request, Categories $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validatedData);

        return response()->json($category);
    }

    public function destroy(Categories $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }
}
