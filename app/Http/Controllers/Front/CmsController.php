<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CmsController extends Controller
{
    //use ValidatesRequests;
    public function cmsPage(){
         $url = Route::getFacadeRoot()->current()->uri;
         $cmsRoutes = CmsPage::where('status', 1)->get()->pluck('url')->toArray();
         // dd($cmsRoutes); die;
        if (in_array($url, $cmsRoutes)) {
            $cmsPageDetails = CmsPage::where('url', $url)->first()->toArray();
            return view('front.pages.cms_page')->with(compact('cmsPageDetails'));
        }else {
            abort(404);
        }
    }

    public function contact(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                "name" => "required|string|max:100",
                "email" => "required|email|max:150",
                "subject" => "required|max:200",
                "message" => "required",

            ];
            $customMessages = [
                'name.required' => 'Please enter your name',
                'name.max' => 'Name should not be more than 100 characters',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please enter valid email',
                'email.max' => 'Email should not be more than 150 characters',
                'subject.required' => 'Please enter subject',
                'subject.max' => 'Subject should not be more than 200 characters',
                'message.required' => 'Please enter message',
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            //$this->validate($data,$rules,$customMessages);
            // $validator = $this->validate($data, $rules, $customMessages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Send User Querry To Admin
            $email = "info@yourdomain.com";
            $messageData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'comment' => $data['message'],  
            ];
            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject("Contact Us Enquiry From Saa Meya");
            });
            $message = "Your Message Has Been Sent Successfully. wE Will Get Back To You Soon";
            return redirect()->back()->with('success_message',$message);
        }
        return view('front.pages.contact');
    }
}
