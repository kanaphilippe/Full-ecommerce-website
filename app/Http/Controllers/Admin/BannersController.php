<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\AdminsRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BannersController extends Controller
{
    use ValidatesRequests;
    public function banners(){
        $banners = Banner::get()->toArray();
         // Set Admin/Subadmins Permission for Banners Pages
        $bannersModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'banners'])->count();
        $bannersModule = array();
        if(Auth::guard('admin')->user()->type=="admin"){
            $bannersModule['view_access'] = 1; 
            $bannersModule['edit_access'] = 1;
            $bannersModule['full_access'] = 1;
        }else if($bannersModuleCount==0){
            $message = "This Feature Is Restricted For You!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $bannersModule = AdminsRole::where(['subadmin_id' => Auth::guard('admin')->user()->id, 'module' => 'banners'])->first()->toArray();
        }
        return view('admin.banners.banners')->with(compact('banners','bannersModule'));
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }

    public function deleteBanner($id){
        // Get Banner Image
        $bannerImage = Banner::where('id', $id)->first();

        // Get Banner Image Path
        $banner_image_path = 'front/images/banners';

        // Delete Banner Image if exists in Folder
        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        // Delete Banner Image From Banners Table
        Banner::where('id', $id)->delete();

        return redirect('admin/banners')->with('success_message', 'Banner Deleted Successfully');
    }

    public function addEditBanner(Request $request,$id=null){
        if($id==""){
            // Add Brand
            $title = "Add Banner";
            $banner = new Banner;
            $message = "Banner Has Been Added Successfully!";
        }else{
            // Edit Brand
            $title = "Edit Banner";
            $banner = Banner::find($id);
            $message = "Banner Has Been Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($id==""){
                    $rules = [
                    'type' => 'required',
                    'image' => 'required',
                ];

            $customMessages = [
                'type.required' => 'Banner Type Is Required',
                'image.required' => 'Banner Image is required',
            ];
             $this->validate($request,$rules,$customMessages);
            }

            // Upload Banners Images
              if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'front/images/banners/'.$imageName;
                    // Upload Brand Image
                    Image::make($image_tmp)->save($image_path);
                    $banner->image = $imageName;
                }
            } 

            if(!isset($data['title'])){
                $data['title'] = "";
            }

            if(!isset($data['link'])){
                $data['link'] = "";
            }

            if(!isset($data['alt'])){
                $data['alt'] = "";
            }

            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->link = $data['link'];
            $banner->sort = $data['sort'];
            $banner->type = $data['type'];
            $banner->status = 1;
            $banner->save();
            return redirect('admin/banners')->with('success_message',$message);

        }
        return view('admin.banners.add_edit_banner')->with(compact('title','banner'));
    }
}
