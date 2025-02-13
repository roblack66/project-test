<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $items = $query->orderBy('created_at', 'DESC')->get();

        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $item = Item::create($validatedData);

        return response()->json($item, 201);
    }

    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id'
        ]);

        $item->update($validatedData);

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully.']);
    }
}
