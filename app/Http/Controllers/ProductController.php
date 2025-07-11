<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMoreImage;
use App\Models\ProductMoreAttr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::with(['category'])->orderBy('id', 'desc')->get();
        return view('admin.product.index', $result);
    }

    public function manage_product(Request $request, $id = '')
    // dd([
    //     'post' => $request->post(),
    // ]);
    {
        if ($id > 0) {
            $product = Product::with('moreAttrs', 'moreImages')->where('id', $id)->first();

            $result = [
                'id' => $product->id,
                'category_id' => $product->category_id,
                'product_name' => $product->product_name,
                'product_slug' => $product->product_slug,
                'product_image' => $product->product_image,
                'product_desc' => $product->product_desc,
                'sort_order' => $product->sort_order,
                'product_stock' => $product->stock,
                'meta_title' => $product->meta_title,
                'meta_keywords' => $product->meta_keywords,
                'meta_desc' => $product->meta_desc,
                'status' => $product->status,
                'in_stock' => $product->in_stock,
                'cod_available' => $product->cod_available,
                'is_featured' => $product->is_featured,
                'is_trending' => $product->is_trending,
                'is_new_arrival' => $product->is_new_arrival,
                'is_combo' => $product->is_combo,
                'is_flavor' => $product->is_flavor,
                'is_savor' => $product->is_savor,
                'more_attrs' => $product->moreAttrs,
                'more_images' => $product->moreImages
            ];
        } else {
            $result = [
                'id' => 0,
                'category_id' => '',
                'product_name' => '',
                'product_slug' => '',
                'product_image' => '',
                'product_desc' => '',
                'sort_order' => 0,
                'product_stock' => 1,
                'meta_title' => '',
                'meta_keywords' => '',
                'meta_desc' => '',
                'status' => 1,
                'in_stock' => 1,
                'cod_available' => 0,
                'is_featured' => 0,
                'is_trending' => 0,
                'is_new_arrival' => 0,
                'is_combo' => 0,
                'is_flavor' => 0,
                'is_savor' => 0,
                'more_attrs' => [],
                'more_images' => []
            ];
        }

        $result['categories'] = DB::table('categories')->where('status', 1)->get();
        return view('admin.product.add', $result);
    }


    public function manage_product_process(Request $request)
    {

        // dd($request->file('more_images'));
        // dd($request->post('weights'));

        $request->validate([
            'product_name' => 'required',
            'product_slug' => 'required|unique:products,product_slug,' . $request->post('id'),
            'product_image' => 'nullable|mimes:jpeg,jpg,png',
        ]);

        if ($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $msg = "Product Updated Successfully";
        } else {
            $model = new Product();
            $msg = "Product Added Successfully";
        }

        // Product image
        if ($request->hasFile('product_image')) {
            if ($request->post('id') > 0 && $model->product_image != '') {
                Storage::disk('public')->delete('media/product/' . $model->product_image);
            }

            $image = $request->file('product_image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('media/product', $image_name, 'public');
            $model->product_image = $image_name;
        }

        // Product Main Info
        $model->category_id = $request->post('category_id');
        $model->product_name = $request->post('product_name');
        $model->product_slug = Str::slug($request->post('product_slug'));
        $model->product_desc = $request->post('product_desc');
        $model->sort_order = $request->post('sort_order') ?? 0;
        $model->product_stock = $request->post('stock') ?? 1;
        $model->meta_title = $request->post('meta_title');
        $model->meta_keywords = $request->post('meta_keywords');
        $model->meta_desc = $request->post('meta_desc');
        $model->status = $request->post('status') == 1 ? 1 : 0;
        $model->in_stock = $request->post('in_stock') ?? 1;
        $model->cod_available = $request->post('cod_available') ?? 0;
        $model->is_featured = $request->post('is_featured') ?? 0;
        $model->is_trending = $request->post('is_trending') ?? 0;
        $model->is_new_arrival = $request->post('is_new_arrival') ?? 0;
        $model->is_combo = $request->post('is_combo') ?? 0;
        $model->is_flavor = $request->post('is_flavor') ?? 0;
        $model->is_savor = $request->post('is_savor') ?? 0;
        $model->save();

        $productId = $model->id;

        // -----------------------------
        // Handle Product More Attributes
        // -----------------------------
        ProductMoreAttr::where('product_id', $productId)->delete();


        if ($request->has('weights')) {
            foreach ($request->weights as $weight) {
                if (!empty($weight['weight']) && !empty($weight['mrp_price']) && !empty($weight['selling_price'])) {
                    ProductMoreAttr::create([
                        'product_id'        => $model->id,
                        'weight'            => $weight['weight'],
                        'weight_type'       => $weight['weight_type'],
                        'mrp_price'         => $weight['mrp_price'],
                        'discount'          => $weight['discount'],
                        'selling_price'     => $weight['selling_price'],
                        'tax_in_percentage' => $weight['tax_in_percentage'],
                        'tax_type'          => $weight['tax_type'],
                        'net_price'         => $weight['net_price'],
                        'tax_in_value'      => $weight['tax_in_value'],
                        'hsncode'           => $weight['hsncode'],
                        'in_stock'          => isset($weight['in_stock']) ? 1 : 0,
                    ]);
                }
            }
        }




        // -----------------------------
        // Handle More Images
        // -----------------------------

        if ($request->hasFile('more_images')) {
            foreach ($request->file('more_images') as $file) {
                if ($file->isValid()) {
                    $imgName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('media/product/more', $imgName, 'public');

                    ProductMoreImage::create([
                        'product_id' => $productId,
                        'img_name'   => $imgName,
                        'status'     => 1,
                    ]);
                }
            }
        }

        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }


    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            $request->session()->flash('error', 'Product not found');
            return redirect('admin/product');
        }

        // Delete product image
        if ($product->product_image && Storage::disk('public')->exists('media/product/' . $product->product_image)) {
            Storage::disk('public')->delete('media/product/' . $product->product_image);
        }

        // Delete more images
        foreach ($product->moreImages as $image) {
            if ($image->img_name && Storage::disk('public')->exists('media/product/more/' . $image->img_name)) {
                Storage::disk('public')->delete('media/product/more/' . $image->img_name);
            }
            $image->delete();
        }

        // Delete more attributes
        $product->moreAttrs()->delete();

        $product->delete();

        $request->session()->flash('message', 'Product deleted successfully');
        return redirect('admin/product');
    }

    public function status(Request $request, $status, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            $request->session()->flash('error', 'Product not found');
            return redirect('admin/product');
        }

        $product->status = $status;
        $product->save();

        $request->session()->flash('message', 'Product status updated');
        return redirect('admin/product');
    }
}
