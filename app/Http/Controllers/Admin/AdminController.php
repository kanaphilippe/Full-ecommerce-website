<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Session;

class AdminController extends Controller
{
    public function dashboard(){
        //Session::put('page','dashboard');
        $categoriesCount = Category::get()->count();
        $productsCount = Product::get()->count();
        $brandsCount = Brand::get()->count();
        $usersCount = User::get()->count();
        return view('admin.dashboard')->with(compact('categoriesCount','productsCount','brandsCount','usersCount'));
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:8'
            ];

            $customMessages = [
                'email.required' => "Email is required",
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];

            $validator = Validator::make($data,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){

                // Remember Admin Email & Password with Cookies
                if(isset($data['remember'])&&!empty($data['remember'])){
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }

                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","Invalide Email or Password!");
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // Check if current Password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                // Check if new password and confirm password is same.
                if($data['new_pwd']==$data['confirm_pwd']){
                    // Update Password
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    return redirect()->back()->with('success_message', 'You Have Successfully Updated Your Password!');
                }else{
                    return redirect()->back()->with('error_message', 'New and Confirm Password Are Not Matching!');
                }
            }else{
                return redirect()->back()->with('error_message', 'Your Current Password is Correct');
            }
        }
        return view('admin.update_password');
    }

    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'admin_mobile' => 'required|numeric|digits:16',
                'admin_image' => 'image',
            ];

            $customMessages = [
                'admin_name.required' => "Name is required",
                'admin_name.regex' => "Valid Name is required",
                'admin_name.max' => "Valid Name is required",
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric' => 'Valid Mobile is required',
                'admin_mobile.digits' => 'Valid Mobile is required',
                'admin_image.image' => 'Valid image is required',
            ];

            $validator = Validator::make($data,$rules,$customMessages);

            // Upload Admin Image
              if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;
                    // Upload Image
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            // Update Admin Details
            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile'],'image'=>$imageName]);
            return redirect()->back()->with('success_message', 'You Have Successfully Updated Your Details!');
        }
        return view('admin.update_details');
    }

    public function subadmins(){
        $subadmins = Admin::where('type', 'subadmin')->get();
        return view('admin.subadmins.subadmins')->with(compact('subadmins'));
    }

    // Update Subadmin
     public function updateSubadminStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            Admin::where('id',$data['subadmin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subadmin_id'=>$data['subadmin_id']]);
        }
    }

    //addEditSubadmin
    public function addEditSubadmin(Request $request,$id=null){
        if($id==""){
            $title = "Add Subadmin";
            $subadmindata = new Admin;
            $message = "Subadmin Added Successfully!";
        }else{
            $title = "Edit Subadmin";
            $subadmindata = Admin::find($id);
            $message = "Subadmin Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if($id==""){
                $subadminCount = Admin::where('email',$data['email'])->count();
                if($subadminCount>0){
                    return redirect()->back()->with('error_message','Subadmin Alredy Exists!');
                }
            }

             // Subadmin Validator
            $rules = [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'image' => 'image'
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Valide Mobile is required',
                'image.image' => 'Valide Image is required',
            ];
            $request->validate($rules, [], $customMessages);

            // Upload Subadmin Image
              if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;
                    // Upload Image
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $subadmindata->image = $imageName;
            $subadmindata->name = $data['name'];
            $subadmindata->mobile = $data['mobile'];
            if($id==""){
                $subadmindata->email = $data['email'];
                $subadmindata->type = 'subadmin';
            }
            if($data['password']!=""){
                $subadmindata->password = bcrypt($data['password']);
            }
            $subadmindata->save();
            return redirect('admin/subadmins')->with('success_message', $message);
        }
        return view('admin.subadmins.add_edit_subadmin')->with(compact('title','subadmindata'));
    }

    // Delete Subadmin
    public function deleteSubadmin($id)
    {
        // Delet Subadmin
        Admin::where('id',$id)->delete();
        return redirect()->back()->with('success_message','SubAdmin Has Been Deleted Successfully!');
    }

    public function updateRole($id,Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            
            // Delete All Earlier Roles for Subadmins
            AdminsRole::where('subadmin_id',$data['subadmin_id'])->delete();

            // Making the Module Dinamic
            foreach ($data as $key => $value) {
                if(isset($value['view'])){
                    $view = $value['view'];
                }else{
                    $view = 0;
                }
                if(isset($value['edit'])){
                    $edit = $value['edit'];
                }else{
                    $edit = 0;
                }
                if(isset($value['full'])){
                    $full = $value['full'];
                }else{
                    $full = 0;
                }

                   $adminsRoleCount = AdminsRole::where(['subadmin_id'=>$data['subadmin_id'],'module'=>$key])->count();
                if($adminsRoleCount>0){
                    AdminsRole::where('subadmin_id',$data['subadmin_id'])->update(['module'=>$key,'view_access'=>$view,'edit_access'=>$edit,'full_access'=>$full]);    
                }else{
                    $role = new AdminsRole;
            $role->subadmin_id = $id;
            $role->module = $key;
            $role->view_access = $view;
            $role->edit_access = $edit;
            $role->full_access = $full;
            $role->save();
               }
            }
            $message = "Subadmin Roles Updated Successfully!";
            return redirect()->back()->with('success_message', $message);
            
        }

        $subadminRoles = AdminsRole::where('subadmin_id', $id)->get()->toArray();
        $subadminDetails = Admin::where('id', $id)->first()->toArray();
        $title = "Update ".$subadminDetails['name']." Subadmin Roles/Persmissions";
        //dd($subadminRoles);
        return view('admin.subadmins.update_roles')->with(compact('title','id','subadminRoles'));
    }
}
