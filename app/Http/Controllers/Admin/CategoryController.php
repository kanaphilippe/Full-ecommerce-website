<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\AdminsRole;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{

    use ValidatesRequests;
    public function categories(){
        $categories = Category::with('parentcategory')->get();

        // Set Admin/Subadmins Permission for Categories Pages
        $categoriesModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'categories'])->count();
        $categoriesModule = array();
        if(Auth::guard('admin')->user()->type=="admin"){
            $categoriesModule['view_access'] = 1; 
            $categoriesModule['edit_access'] = 1;
            $categoriesModule['full_access'] = 1;
        }else if($categoriesModuleCount==0){
            $message = "This Feature Is Restricted For You!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $categoriesModule = AdminsRole::where(['subadmin_id' => Auth::guard('admin')->user()->id, 'module' => 'categories'])->first()->toArray();
        }
        //dd($categories);
        return view('admin.categories.categories')->with(compact('categories','categoriesModule'));
    }

    // Update Category Status
    public function updateCategoryStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1; 
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    // Delete Category
    public function deleteCategory($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Category Has Been Deleted Successfully!');
    }

    public function addEditCategory(Request $request,$id=null){
        $getCategories = Category::getCategories();
        if($id==""){
            // Add Category
            $title = "Add Category";
            $category = new Category;
            $message = "Category Has Been Added Successfully!";
        }else{
            // Edit Category
            $title = "Edit Category";
            $category = Category::find($id);
            $message = "Category Has Been Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if($id==""){
                    $rules = [
                    'category_name' => 'required',
                    'url' => 'required|unique:categories',
                ];
            }else{
                $rules = [
                    'category_name' => 'required',
                    'url' => 'required ',
                ];
            }

            $customMessages = [
                'category_name.required' => 'Category Name Is Required',
                'url.required' => 'Category URL is required',
                'url.unique' => 'Unique Category URL is Required',
            ];

            $this->validate($request,$rules,$customMessages);

            // Upload Category Images
              if($request->hasFile('category_image')){
                $image_tmp = $request->file('category_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'front/images/categories/'.$imageName;
                    // Upload Category Image
                    Image::make($image_tmp)->save($image_path);
                    $category->category_image = $imageName;
                }
            }else{
               $category->category_image = "";
            }

            if(empty($data['category_discount'])){
                $data['category_discount'] = 0;
            }

            $category->category_name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();
            return redirect('admin/categories')->with('success_message',$message);

        }
        return view('admin.categories.add_edit_category')->with(compact('title','getCategories','category'));
    }

    public function deleteCategoryImage($id){
        // Get Category Image
        $categoryImage = Category::select('category_image')->where('id',$id)->first();
       //$category_image = $_POST['$category_image'];
        // Delete Category Image
        

        // Get Category Image Path
        $category_image_path = 'front/images/categories/';

        // Delet Category Image from Categories Folder If Exist
        if(file_exists($category_image_path.$categoryImage->category_image)){
            unlink($category_image_path.$categoryImage->category_image);
        }

        // Delete Category Image from category table
        Category::where('id', $id)->update(['category_image' => '']);

        return redirect()->back()->with('success_message', 'Category Image Has Been Deleted Successfully!');
    }
}
