<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminsRole;

class ShippingController extends Controller
{
    public function shippingCharges(){
        $shipping_charges = ShippingCharge::get()->toArray();
        
        // Set Admin/Subadmins Permission for Brands Pages
        $shippingModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'brands'])->count();
        $shippingModule = array();
        if(Auth::guard('admin')->user()->type=="admin"){
            $shippingModule['view_access'] = 1; 
            $shippingModule['edit_access'] = 1;
            $shippingModule['full_access'] = 1;
        }else if($shippingModuleCount==0){
            $message = "This Feature Is Restricted For You!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $shippingModule = AdminsRole::where(['subadmin_id' => Auth::guard('admin')->user()->id, 'module' => 'brands'])->first()->toArray();
        }

        return view('admin.shipping.shipping_charges')->with(compact('shipping_charges','shippingModule'));
    }

    // Update Shipping Status
    public function updateShippingStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            ShippingCharge::where('id',$data['shipping_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'shipping_id'=>$data['shipping_id']]);
        }
    }

    public function editShippingCharges( Request $request, $id,){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            ShippingCharge::where('id', $id)->update(['0_500g' => $data['0_500g'],'501_1000g' => $data['501_1000g'],'1001_1500g' => $data['1001_1500g'],'1501_2000g' => $data['1501_2000g'],'2001_2500g' => $data['2001_2500g'],'2501_3000g' => $data['2501_3000g'],'3001_3500g' => $data['3001_3500g'],'3501_4000g' => $data['3501_4000g'],'4001_4500g' => $data['4001_4500g'],'4501_5000g' => $data['4501_5000g'],'Above_5000g' => $data['Above_5000g']]);
            $message = "Shipping Charges update Successfully!";
            return redirect()->back()->with('success_message', $message);
        }
        $shippingDetails = ShippingCharge::where('id', $id)->first();
        $message = "Shipping Charges Updated Successfully!";
        $title = "Edit Shipping Charges";
        //return redirect()->back()->with('success_message', $message);
        return view('admin.shipping.edit_shipping_charges')->with(compact('shippingDetails','title','message'));
    }
}
