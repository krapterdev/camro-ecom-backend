<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductWeight;

class ProductWeightController extends Controller
{
    public function index()
    {
        $weights = ProductWeight::orderBy('id', 'desc')->get();
        return response()->json(['status' => true, 'data' => $weights]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $weight = ProductWeight::create($request->only(['title', 'value', 'status']));

        return response()->json(['status' => true, 'message' => 'Weight created successfully', 'data' => $weight]);
    }

    public function edit($id)
    {
        $weight = ProductWeight::find($id);
        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        return response()->json(['status' => true, 'data' => $weight]);
    }

    public function update(Request $request, $id)
    {
        $weight = ProductWeight::find($id);
        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $weight->update($request->only(['title', 'value', 'status']));

        return response()->json(['status' => true, 'message' => 'Weight updated successfully']);
    }

    public function updateStatus($id, $status)
    {
        $weight = ProductWeight::find($id);
        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        $weight->status = $status;
        $weight->save();

        return response()->json(['status' => true, 'message' => 'Status updated successfully']);
    }

    public function destroy($id)
    {
        $weight = ProductWeight::find($id);
        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        $weight->delete();

        return response()->json(['status' => true, 'message' => 'Weight deleted successfully']);
    }
}
