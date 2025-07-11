<?php

namespace App\Http\Controllers;

use App\Models\WebsiteMarkquee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebsiteMarqueeContoller extends Controller
{
    public function index()
    {
        $result['data'] = WebsiteMarkquee::all();
        return view('admin.markquee.index', $result);
    }

    public function manage_markquee(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = WebsiteMarkquee::where(['id' => $id])->get();

            $result['text'] = $arr[0]->text;
            $result['text2'] = $arr[0]->text2;
 
            $result['status'] = $arr[0]->status;
            $result['status_selected'] = $arr[0]->status == 1 ? 'checked' : '';

            $result['id'] = $arr[0]->id;
            $result['markquee'] = DB::table('website_markquees')->where(['status' => 1])->where('id', '!=', $id)->get();
        } else {
            $result['text'] = '';
            $result['text2'] = '';

            $result['status'] = 1;
            $result['status_selected'] = 'checked';

            $result['id'] = 0;
            $result['markquee'] = DB::table('website_markquees')->where(['status' => 1])->get();
        }
        return view('admin.markquee.add', $result);
    }


    public function manage_markquee_process(Request $request)
    {
        $postdata = $request->post();

        // dd([
        //     'post' => $request->post(),
        // ]);

        $request->validate([
            'text' => 'required',
            'text2' => 'required',
            'status' => 'required|in:0,1',
        ]);

        if ($request->post('id') > 0) {
            $model = WebsiteMarkquee::find($request->post('id'));
            $msg = "markquee Has been updated";
        } else {    
            $model = new WebsiteMarkquee();
            $msg = "markquee Has been added";
        }


        // Save other fields
        $model->text = $request->post('text');
        $model->text2 = $request->post('text2');
        $model->status = $request->post('status') == '1' ? 1 : 0;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/markquee');
    }


    public function delete(Request $request, $id)
    {
        $model = WebsiteMarkquee::find($id);
        $model->delete();
        $request->session()->flash('message', 'markquee deleted');
        return redirect('admin/markquee');
    }

    public function status(Request $request, $status, $id)
    {
        $model = WebsiteMarkquee::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'markquee status updated');
        return redirect('admin/markquee');
    }
}
