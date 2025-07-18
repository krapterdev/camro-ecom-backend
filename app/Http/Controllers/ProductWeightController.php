<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductWeight;


class ProductWeightController extends Controller
{
    public function index()
    {
        return response()->json(ProductWeight::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'value' => 'required|string',
        ]);

        ProductWeight::create($request->only(['title', 'value', 'status']));
        return response()->json(['message' => 'Weight added successfully']);
    }

    public function edit($id)
    {
        $weight = ProductWeight::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $weight,
        ]);
    }

    public function update(Request $request, $id)
    {
        $weight = ProductWeight::findOrFail($id);
        $weight->update($request->only(['title', 'value', 'status']));
        return response()->json(['message' => 'Weight updated successfully']);
    }

    public function destroy($id)
    {
        ProductWeight::destroy($id);
        return response()->json(['message' => 'Weight deleted successfully']);
    }

    public function updateStatus($id, $status)
    {
        $weight = ProductWeight::findOrFail($id);
        $weight->status = $status;
        $weight->save();

        return response()->json(['message' => 'Status updated']);
    }
}