<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductWeight;

class ProductWeightController extends Controller
{
    // GET: /weight/list
    public function index()
    {
        $weights = ProductWeight::orderBy('id', 'desc')->get();
        return response()->json(['status' => true, 'data' => $weights]);
    }

    // POST: /weight/add
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $weight = ProductWeight::create($validated);

        return response()->json(['status' => true, 'message' => 'Weight added successfully', 'data' => $weight]);
    }

    // GET: /weight/edit/{id}
    public function edit($id)
    {
        $weight = ProductWeight::find($id);

        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        return response()->json(['status' => true, 'data' => $weight]);
    }

    // POST: /weight/update/{id}
    public function update(Request $request, $id)
    {
        $weight = ProductWeight::find($id);

        if (!$weight) {
            return response()->json(['status' => false, 'message' => 'Weight not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $weight->update($validated);

        return response()->json(['status' => true, 'message' => 'Weight updated successfully']);
    }

    // PUT: /weight/status/{id}/{status}
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

    // DELETE: /weight/delete/{id}
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