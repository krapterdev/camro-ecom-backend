<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{

    public function index()
    {
        $result['data'] = Category::all();
        return view('admin/category/index', $result);
    }

    public function manage_category(Request $request, $id = '')
    {
        //         dd([
//     'post' => $request->post(),
// ]);

        if ($id > 0) {

            $arr = Category::where(['id' => $id])->get();

            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
            $result['category_image'] = $arr[0]->category_image;

            $result['status'] = $arr[0]->status;
            $result['status_selected'] = $arr[0]->status == 1 ? 'checked' : '';

            // $result['is_home'] = $arr[0]->is_home;
            // $result['is_home_selected'] = $arr[0]->is_home == 1 ? 'checked' : '';

            $result['id'] = $arr[0]->id;
            $result['category'] = DB::table('categories')->where(['status' => 1])->where('id', '!=', $id)->get();
        } else {
            $result['category_name'] = '';
            $result['category_slug'] = '';
            $result['category_image'] = '';

            $result['status'] = 1;
            $result['status_selected'] = 'checked';

            // $result['is_home'] = 1;
            // $result['is_home_selected'] = 'checked';

            $result['id'] = 0;
            $result['category'] = DB::table('categories')->where(['status' => 1])->get();
        }



        // if($id>0){
        //     $arr=Category::where(['id'=>$id])->get(); 

        //     $result['category_name']=$arr['0']->category_name;
        //     $result['category_slug']=$arr['0']->category_slug;
        //     $result['category_image']=$arr['0']->category_image;
        //     $result['is_home']=$arr['0']->is_home;
        //     $result['is_home_selected']="";
        //     if($arr['0']->is_home==1){
        //         $result['is_home_selected']="checked";
        //     }
        //     $result['id']=$arr['0']->id;

        //     $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();


        // }else{
        //     $result['category_name']='';
        //     $result['category_slug']='';
        //      $result['category_image']='';
        //     $result['is_home']="";
        //     $result['is_home_selected']="";
        //     $result['id']=0;

        //     $result['category']=DB::table('categories')->where(['status'=>1])->get();
        // }

        return view('admin.category.add', $result);
    }



    public function manage_category_process(Request $request)
    {
        $postdata = $request->post();
        $postdataf = $request->file('category_image');

        // dd([
        //     'post' => $request->post(),
        //     // 'file' => $request->file('category_image')
        // ]);


        // $request->validate([
        //     'category_name' => 'required',
        //     'category_image' => 'nullable|mimes:jpeg,jpg,png',
        //     'category_slug' => 'required|unique:categories,category_slug,' . $request->post('id'),
        // ]);

        $request->validate([
            'category_name' => 'required',
            'category_image' => 'nullable|mimes:jpeg,jpg,png',
            'category_slug' => 'required|unique:categories,category_slug,' . $request->post('id'),
            'status' => 'required|in:0,1',
            // 'is_home' => 'required|in:0,1',
        ]);



        if ($request->post('id') > 0) {
            $model = Category::find($request->post('id'));
            $msg = "Category Has been updated";
        } else {
            $model = new Category();
            $msg = "Category Has been added";
        }

        // ✅ Image Upload / Replace
        if ($request->hasFile('category_image')) {

            // If updating, delete old image
            if ($request->post('id') > 0) {
                $existing = Category::find($request->post('id'));
                if ($existing && $existing->category_image && Storage::disk('public')->exists('media/category/' . $existing->category_image)) {
                    Storage::disk('public')->delete('media/category/' . $existing->category_image);
                }
            }

            $image = $request->file('category_image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;

            // Save image to storage/app/public/media/category
            $image->storeAs('media/category', $image_name, 'public');

            $model->category_image = $image_name;
        }

        // Save other fields
        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        // $model->is_home = $request->post('is_home') !== null ? 1 : 0;
        // $model->is_home = $request->post('is_home') == '1' ? 1 : 0;
        $model->status = $request->post('status') == '1' ? 1 : 0;

        // $model->status = 1;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/category');
    }


    public function delete(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message', 'Category deleted');
        return redirect('admin/category');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Category status updated');
        return redirect('admin/category');
    }

     

}




