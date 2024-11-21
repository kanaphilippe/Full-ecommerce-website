<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminsRole;

class CmsController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CmsPages = CmsPage::get()->toArray();
        //dd($CmsPages);

        // Set Admin/Subadmins Permission for CMS Pages
        $cmspagesModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'cms_pages'])->count();
        $pagesModule = array();
        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1; 
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($cmspagesModuleCount==0){
            $message = "This Feature Is Restricted For You!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['subadmin_id' => Auth::guard('admin')->user()->id, 'module' => 'cms_pages'])->first()->toArray();
        }

        return view('admin.pages.cms_pages')->with(compact('CmsPages','pagesModule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add CMS Page";
            $cmspage = new CmsPage;
            $message = "CMS Page Added Successfully";
        }else{
            $title = "Edit CMS Page";
            $cmspage = CmsPage::find($id);
            $message = "CMS Page Was Updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // CMS Pages Validator
            $rules = [
                'title' => 'required',
                'url' => 'required',
                'description' => 'required'
            ];
            $customMessages = [
                'title.required' => 'Page Title is required',
                'url.required' => 'Page URL is required',
                'description.required' => 'Page Description is required',
            ];
            $this->validate($request,$rules,$customMessages);

            $cmspage->title = $data['title'];
            $cmspage->url = $data['url'];
            $cmspage->description = $data['description'];
            $cmspage->meta_title = $data['meta_title'];
            $cmspage->meta_description = $data['meta_description'];
            $cmspage->meta_keywords = $data['meta_keywords'];
            $cmspage->status = 1;
            $cmspage->save();
            return redirect('admin/cms-pages')->with('success_message',$message);
        }
        return view('admin.pages.add_edit_cmspage')->with(compact('title','cmspage')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            CmsPage::where('id',$data['page_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'page_id'=>$data['page_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delet CMS Page
        CmsPage::where('id',$id)->delete();
        return redirect()->back()->with('success_message','CMS Page Has Been Deleted Successfully!');
    }
}
