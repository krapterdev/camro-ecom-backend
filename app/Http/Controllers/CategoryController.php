<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::orderBy('id', 'desc')->get());
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        // 🛡️ Validate incoming request
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'category_slug' => 'required|unique:categories,category_slug',
            'category_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:500',
        ], [
            'category_image.max' => 'The image size must not exceed 500 KB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // 🧱 Create new Category instance
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->status = $request->status ?? 0;

        // 🖼️ Handle image upload with directory check
        if ($request->hasFile('category_image')) {
            $folderPath = 'media/category';

            // 📂 Create folder if it doesn't exist
            if (!Storage::exists($folderPath)) {
                Storage::makeDirectory($folderPath);
            }

            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->extension();

            // 🪄 Save image to target folder
            $image->storeAs($folderPath, $imageName);
            $category->category_img = $imageName;
        }

        // 📥 Save category to database
        $category->save();

        // ✅ Return success response
        return response()->json([
            'message' => 'Category added successfully',
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'category_slug' => 'required|unique:categories,category_slug,' . $id,
            'category_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:500',
        ], [
            'category_image.max' => 'The image size must not exceed 500 KB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->status = $request->status ?? 0;

        if ($request->hasFile('category_image')) {

            if ($category->category_img && Storage::exists('media/category/' . $category->category_img)) {
                Storage::delete('media/category/' . $category->category_img);
            }

            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('media/category', $imageName);
            $category->category_img = $imageName;
        }

        $category->save();

        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function updateStatus($id, $status)
    {
        $category = Category::findOrFail($id);
        $category->status = $status;
        $category->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->category_img && Storage::exists('media/category/' . $category->category_img)) {
            Storage::delete('media/category/' . $category->category_img);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }


    // 
}
