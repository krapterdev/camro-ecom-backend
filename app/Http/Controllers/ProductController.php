<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMoreImage;
use App\Models\ProductMoreAttr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_slug'     => 'required|string|unique:products,product_slug',
            'product_desc'     => 'nullable|string',
            'category_id'      => 'required|exists:categories,id',
            'product_image1'   => 'nullable|image|mimes:jpeg,jpg,png',
            'product_image2'   => 'nullable|image|mimes:jpeg,jpg,png',
            // 'status'            => 'nullable|boolean',
            // 'in_stock'          => 'nullable|boolean',
            // 'cod_available'     => 'nullable|boolean',
            // 'is_triplyhammered' => 'nullable|boolean',
            // 'is_trending'       => 'nullable|boolean',
            // 'is_new_arrival'    => 'nullable|boolean',
            // 'is_besteller'      => 'nullable|boolean',
            // 'meta_title'        => 'nullable|string|max:255',
            // 'meta_keywords'     => 'nullable|string',
            // 'meta_desc'         => 'nullable|string',
        ]);

        $product = new Product();
        $product->product_name       = $request->product_name;
        $product->product_slug       = Str::slug($request->product_slug);
        $product->product_desc       = $request->product_desc;
        $product->category_id        = $request->category_id;
        $product->status             = $request->boolean('status');
        $product->in_stock           = $request->boolean('in_stock');
        $product->cod_available      = $request->boolean('cod_available');
        $product->is_triplyhammered  = $request->boolean('is_triplyhammered');
        $product->is_trending        = $request->boolean('is_trending');
        $product->is_new_arrival     = $request->boolean('is_new_arrival');
        $product->is_besteller       = $request->boolean('is_besteller');
        $product->meta_title         = $request->meta_title;
        $product->meta_keywords      = $request->meta_keywords;
        $product->meta_desc          = $request->meta_desc;

        // Upload Image 1
        if ($request->hasFile('product_image1')) {
            $img = $request->file('product_image1');
            $filename = time() . '_1.' . $img->getClientOriginalExtension();
            $img->storeAs('media/product', $filename, 'public');
            $product->product_image1 = $filename;
        }

        // Upload Image 2
        if ($request->hasFile('product_image2')) {
            $img = $request->file('product_image2');
            $filename = time() . '_2.' . $img->getClientOriginalExtension();
            $img->storeAs('media/product', $filename, 'public');
            $product->product_image2 = $filename;
        }

        $product->save();

        // Handle Price Matrix
        if ($request->has('weights')) {
            $weights = json_decode($request->weights, true);

            foreach ($weights as $row) {
                ProductMoreAttr::create([
                    'product_id'        => $product->id,
                    'size'              => $row['size'] ?? '',
                    'size_type'         => $row['size_type'] ?? '',
                    'weight'            => $row['weight'] ?? '',
                    'weight_type'       => $row['weight_type'] ?? '',
                    'mrp_price'         => $row['mrp_price'] ?? 0,
                    'discount'          => $row['discount'] ?? 0,
                    'selling_price'     => $row['selling_price'] ?? 0,
                    'tax_in_value'      => $row['tax_in_value'] ?? 40,
                    'net_price'         => $row['net_price'] ?? 0,
                    'hsncode'           => $row['productcode'] ?? '',
                    'in_stock'          => isset($row['in_stock']) && $row['in_stock'] ? 1 : 0,
                ]);
            }
        }

        // Handle Variation Images
        if ($request->hasFile('more_images')) {
            foreach ($request->file('more_images') as $img) {
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->storeAs('media/product/more', $filename, 'public');

                ProductMoreImage::create([
                    'product_id' => $product->id,
                    'img_name'   => $filename,
                    'status'     => 1,
                ]);
            }
        }

        return response()->json(['message' => 'Product created successfully', 'product_id' => $product->id]);
    }


    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return response()->json($products);
    }

    // ✅ Edit One Product
    public function edit($id)
    {
        try {
            $product = Product::with(['productAttrs', 'productImages'])->findOrFail($id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Server error' . $e->getMessage()], 500);
        // }
    }


    // ✅ Update Product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_slug'     => 'required|string|unique:products,product_slug,' . $id,
            'product_desc'     => 'nullable|string',
            'category_id'      => 'required|exists:categories,id',
            'product_image1'   => 'nullable|image|mimes:jpeg,jpg,png',
            'product_image2'   => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $product->product_name  = $request->product_name;
        $product->product_slug  = Str::slug($request->product_slug);
        $product->product_desc  = $request->product_desc;
        $product->category_id   = $request->category_id;

        if ($request->hasFile('product_image1')) {
            $img = $request->file('product_image1');
            $filename = time() . '_1.' . $img->getClientOriginalExtension();
            $img->storeAs('media/product', $filename, 'public');
            $product->product_image1 = $filename;
        }

        if ($request->hasFile('product_image2')) {
            $img = $request->file('product_image2');
            $filename = time() . '_2.' . $img->getClientOriginalExtension();
            $img->storeAs('media/product', $filename, 'public');
            $product->product_image2 = $filename;
        }

        $product->save();

        return response()->json(['message' => 'Product updated successfully']);
    }

    // ✅ Change Product Status
    public function updateStatus($id, $status)
    {
        $product = Product::findOrFail($id);
        $product->status = $status;
        $product->save();

        return response()->json(['message' => 'Product status updated']);
    }

    // ✅ Delete Product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete related matrix + images
        ProductMoreAttr::where('product_id', $product->id)->delete();
        ProductMoreImage::where('product_id', $product->id)->delete();

        // Optional: remove images from storage

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function deleteVariationImage($id)
    {
        $image = ProductMoreImage::findOrFail($id);

        // Remove from disk if needed
        Storage::disk('public')->delete("media/product/more/{$image->img_name}");

        $image->delete();

        return response()->json(['message' => 'Variation image deleted']);
    }
}
