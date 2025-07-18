<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSize;

class ProductSizeController extends Controller
{
    public function index()
    {
        return response()->json(ProductSize::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'value' => 'required|string',
        ]);

        ProductSize::create($request->only(['title', 'value', 'status']));
        return response()->json(['message' => 'Size added successfully']);
    }

    public function update(Request $request, $id)
    {
        $size = ProductSize::findOrFail($id);
        $size->update($request->only(['title', 'value', 'status']));
        return response()->json(['message' => 'Size updated successfully']);
    }

    public function destroy($id)
    {
        ProductSize::destroy($id);
        return response()->json(['message' => 'Size deleted successfully']);
    }

    public function updateStatus($id, $status)
    {
        $size = ProductSize::findOrFail($id);
        $size->status = $status;
        $size->save();

        return response()->json(['message' => 'Status updated']);
    }

     public function edit($id)
    {
        $size = ProductSize::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $size,
        ]);
    }

}
