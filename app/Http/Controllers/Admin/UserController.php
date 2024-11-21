<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminsRole;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use ValidatesRequests;
    public function users(){
        Session::put('users');
        $users = User::get()->toArray();

        // Set Admin/Subadmins Permission for Users Pages
        $usersModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->count();
        $usersModule = array();
        if(Auth::guard('admin')->user()->type=="admin"){
            $usersModule['view_access'] = 1; 
            $usersModule['edit_access'] = 1;
            $usersModule['full_access'] = 1;
        }else if($usersModuleCount==0){
            $message = "This Feature Is Restricted For You!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $usersModule = AdminsRole::where(['subadmin_id' => Auth::guard('admin')->user()->id, 'module' => 'users'])->first()->toArray();
        }
        return view('admin.users.users')->with(compact('users','usersModule'));
    }

    // Update Users Status
    public function updateUserStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            User::where('id',$data['user_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'user_id'=>$data['user_id']]);
        }
    }
}
