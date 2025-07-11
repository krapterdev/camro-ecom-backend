<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSlider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebsiteSliderController extends Controller
{
    public function index()
    {
        $result['data'] = WebsiteSlider::all();
        return view('admin/slider/index', $result);
    }

    public function manage_slider(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = WebsiteSlider::where(['id' => $id])->get();

            $result['slider_name'] = $arr[0]->slider_name;
            $result['slider_slug'] = $arr[0]->slider_slug;
            $result['slider_image'] = $arr[0]->slider_image;

            $result['status'] = $arr[0]->status;
            $result['status_selected'] = $arr[0]->status == 1 ? 'checked' : '';

            $result['id'] = $arr[0]->id;
            $result['slider'] = DB::table('website_sliders')->where(['status' => 1])->where('id', '!=', $id)->get();
        } else {
            $result['slider_name'] = '';
            $result['slider_slug'] = '';
            $result['slider_image'] = '';

            $result['status'] = 1;
            $result['status_selected'] = 'checked';

            $result['id'] = 0;
            $result['slider'] = DB::table('website_sliders')->where(['status' => 1])->get();
        }
        return view('admin.slider.add', $result);
    }


    public function manage_slider_process(Request $request)
    {
        $postdata = $request->post();
        $postdataf = $request->file('slider_image');

        // dd([
        //     'post' => $request->post(),
        //     // 'file' => $request->file('slider_image')
        // ]);

        $request->validate([
            'slider_name' => 'required',
            'slider_image' => 'nullable|mimes:jpeg,jpg,png',
            'status' => 'required|in:0,1',
        ]);

        if ($request->post('id') > 0) {
            $model = WebsiteSlider::find($request->post('id'));
            $msg = "slider Has been updated";
        } else {
            $model = new WebsiteSlider();
            $msg = "slider Has been added";
        }

        // ✅ Image Upload / Replace
        if ($request->hasFile('slider_image')) {
            // If updating, delete old image
            if ($request->post('id') > 0) {
                $existing = WebsiteSlider::find($request->post('id'));
                if ($existing && $existing->slider_image && Storage::disk('public')->exists('media/slider/' . $existing->slider_image)) {
                    Storage::disk('public')->delete('media/slider/' . $existing->slider_image);
                }
            }

            $image = $request->file('slider_image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;

            // Save image to storage/app/public/media/slider
            $image->storeAs('media/slider', $image_name, 'public');
            $model->slider_image = $image_name;
        }

        // Save other fields
        $model->slider_name = $request->post('slider_name');
        $model->slider_slug = $request->post('slider_slug');
        $model->status = $request->post('status') == '1' ? 1 : 0;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/slider');
    }


    public function delete(Request $request, $id)
    {
        $model = WebsiteSlider::find($id);
        $model->delete();
        $request->session()->flash('message', 'Slider deleted');
        return redirect('admin/slider');
    }

    public function status(Request $request, $status, $id)
    {
        $model = WebsiteSlider::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Slider status updated');
        return redirect('admin/slider');
    }
}
