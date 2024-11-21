<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function loginUser(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'Valid Email Is Required',
                'password.required' => 'Password is required',
                'email.email' => 'Invalid email',
                'email.unique' => 'Email already exists',
                'password.min' => 'Password must be at least 8 characters',
                
            ]
        );
            if ($validator->passes()) {
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    // Remember User Email and Password
                    if (!empty($data['remember-me'])) {
                        setcookie("user-email", $data['email'], time() + 3600);// expires in 1 hour
                        setcookie("user-password", $data['password'], time() + 3600); // expires in 1 hour
                    }else {
                        setcookie("user-email");
                        setcookie("user-password");
                    }
                    if(Auth::user()->status==0){
                        Auth::logout();
                        return response()->json(['status'=>false,'type'=>'inactive','message'=>'Your Account Have Not Yet Been Activated! ']); 
                    }

                    // Update User Cart With User Id
                    if (!empty(Session::get('session_id'))){
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
                    }

                    $redirectUrl = url('cart');
                    return response()->json(['status'=>true,'type'=>'success','redirectUrl'=>$redirectUrl]); 
                }else{
                    return response()->json(['status'=>false,'type'=>'incorrect','message'=>'You Have Entered A Wrong Email Or Password!']); 
                }
            }else{
                return response()->json(['status'=>false,'type'=>'error','errors'=>$validator->messages()]); 
            }
        }
        return view('front.users.login');
    }

    public function registerUser(Request $request){
        if($request->ajax()){

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:150',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ],
            [
                'name.required' => 'Name is required',
                'mobile.required' => 'Mobile is required',
                'email.required' => 'Valid Email Is Required',
                'password.required' => 'Password is required',
                'email.email' => 'Invalid email',
                'email.unique' => 'Email already exists',
                'password.min' => 'Password must be at least 8 characters',
                
            ]
        );
            if($validator->passes()){
            $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                // Register the User
                //$user = new User();
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                // Activate The User Only When The User Confirm His Email Account

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = ['name' => $data['name'], 
                'email' => $data['email'], 
                'code' => base64_encode($data['email'])];
                Mail::send('emails.confirmation', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Pleas Confirm Your Saa Meya Account');
                });

                // Redirect User To The Login Page
                $redirectURL = url('user/redirect');
                return response()->json(['status'=>true,
                'type'=>'success',
                'redirectUrl'=>$redirectURL,
                'message'=>'Please Confirm Your Email To Activate Your Account'
            ]); 

                /*if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                    // Send Register Email
                    $email = $data['email'];
                    $messageData = ['name' => $data['name'], 'mobile' => $data['mobile'], 'email' => $data['email']];
                    Mail::send('emails.register', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Your Registration To Saa Meya Is Successfull');
                    });

                    $redirectUrl = url('cart');
                    return response()->json(['status'=>true,'type'=>'success','redirectUrl'=>$redirectUrl]); 
                }*/
            }else {
                return response()->json(['status'=>false,'type'=>'validation','errors'=>$validator->messages()]); 
            }

        }
        return view('front.users.register');
    }

    public function confirmAccount($code){
        $email = base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if($userCount>0){
            $userDetails = User::where('email',$email)->first();
            if ($userDetails->status==1) {
                // Redirect The User To Login Page With Error Message
                return redirect('user/login')->with('error_message', 'Your Account Is Already Activated. You Can Login Now.');
            }else{
                // Update The User Status
                User::where('email', $email)->update(['status' => 1]);
                // Send Welcome Email
                    $messageData = ['name' => $userDetails->name, 'mobile' => $userDetails->mobile, 'email' => $email];
                    Mail::send('emails.register', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Your Registration To Saa Meya Is Successfull');
                    });

                    // Redirect The User To Login Page With Success Message
                    return redirect('user/login')->with('success_message','Your Account Has Been Activated You Can Now Login.'); 

            }
        }else{
            abort(404);
        }
    }

    public function forgotPassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users'
            ],
            [
                'email.required' => 'Valid Email Is Required',
                'email.email' => 'Invalid email',
                'email.unique' => 'Email already exists',
                
            ]
        );
        if($validator->passes()){
            
            // Send Email To User With Reset Password Link
                $email = $data['email'];
                $messageData = ['email' => $data['email'], 'code' => base64_encode($data['email'])];
               Mail::send('emails.reset_password', $messageData,function($message) use($email){
                        $message->to($email)->subject('Reset Your Password');
                    });
                    // Show Success Message
                    return response()->json(['type'=>'success','message' => 'Reset Passord Link Has Been Seed To Your Register Email']);

        }else{
            return response()->json(['status'=>false,'type'=>'error','errors'=>$validator->messages()]); 
        }
        }else{
            return view('front.users.forgot_password');
        }
    }

    public function resetPassword(Request $request,$code=null)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $email = base64_decode($data['code']);
            $userCount = User::where('email', $email)->count();
            if ($userCount > 0) {
                // Update New Password
                User::where('email', $email)->update(['password' => bcrypt($data['password'])]);
                
                // Send Confirmation Email To User
                $messageData = ['email' => $email];
               Mail::send('emails.new_password_confirmation', $messageData,function($message) use($email){
                        $message->to($email)->subject('Password Updated');
                    });
                    // Show Success Message
                    return response()->json(['type'=>'success','message' => 'Password reset for your account. You Can Now Login']);
            }else{
                abort(404);
            } 
        }else {
            return view('front.users.reset_password')->with(compact('code'));
        }
    }

    // User Account
    public function account(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:150',
                'city' => 'required|string|max:150',
                'state' => 'required|string|max:150',
                'address' => 'required|string|max:150',
                'pincode' => 'required|string|max:150',
                'mobile' => 'required|numeric|digits:10',
                'country' => 'required|string|max:150',
            ]
        );
            if ($validator->passes()) {
                // Update User Details
                User::where('id',Auth::user()->id)->update([
                    'name' => $data['name'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'address' => $data['address'],
                    'pincode' => $data['pincode'],
                    'mobile' => $data['mobile'],
                    'country' => $data['country'],
                ]);
                // Redirect Back User With Success Message
                return response()->json(['status'=>true,'type'=>'success','message' => 'User Details Updated Successfully']);
            }else {
                return response()->json(['status'=>false,'type'=>'validation','errors'=>$validator->messages()]); 
            }
        }else{
            $countries = Country::where('status', 1)->get()->toArray();
            return view('front.users.account')->with(compact('countries'));
        }
    }

    public function updatePassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password'
            ]);
            if ($validator->passes()) {
                // Update User Password
                $current_password = $data['current_password'];
                
                // Get Current Password Form users Table
                $checkPassword = User::where('id', Auth::user()->id)->first();

                // Compare Current Password
                if(Hash::check($current_password,$checkPassword->password)){
                    // Update Password
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']);
                    $user->save();
                    // Redirect Back User With Success Message
                    return response()->json(['type'=>'success','message' => 'Password Updated Successfully !']);
                }else{
                    // Redirect Back Users With error Message
                    return response()->json(['type' => 'incorrect', 'message' => 'Your Current Password Is Not Correct !']);
                }
            }else{
                return response()->json(['type' =>'error','errors' => $validator->messages()]);
            }
        }else{
            return view('front.users.update_password');
        }
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('user/login');
    }
}
