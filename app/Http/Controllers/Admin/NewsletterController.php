<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Exports\subscribersExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    public function subscribers(){
        $subscribers = NewsletterSubscriber::get()->toArray();
        // dd($subscribers);
        return view('admin.subscribers.subscribers')->with(compact('subscribers'));
    }

    public function updateSubscriberStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            NewsletterSubscriber::where('id',$data['subscriber_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subscriber_id'=>$data['subscriber_id']]);
        }
    }

    public function deleteSubscriber($id)
    {
        NewsletterSubscriber::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Subscriber Has Been Deleted Successfully!');
    }

     public function exportSubscribers(){
        return Excel::download(new subscribersExport, 'subscribers.xlsx');
    }
}
