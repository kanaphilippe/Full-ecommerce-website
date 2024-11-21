<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addRating(Request $request){
        if(!Auth::check()){
            $message = "Please Login To Rate This Product";
            return redirect()->back()->with('error_message', $message);
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // Check if User Have Not Yet Rate This Product
            $user_id = Auth::user()->id;
            $ratingCount = Rating::where(['user_id' => $user_id, 'product_id' => $data['product_id']])->count();
            if ($ratingCount > 0) {
                $message = "Sorry You Have Already Rated This Product";
                return redirect()->back()->with('error_message', $message);
            }else{
                if(empty($data['rating'])){
                    $message = "Please Select A Rating Star";
                    return redirect()->back()->with('error_message', $message);
                }else {
                    $rating = new Rating;
                    $rating->user_id = $user_id;
                    $rating->product_id = $data['product_id'];
                    $rating->rating = $data['rating'];
                    $rating->review = $data['review'];
                    $rating->status = 0; 
                    $rating->save();
                    $message = "Thanks For Rating This Product! It will be display as soon as possible.";
                    return redirect()->back()->with('success_message', $message);
                }
            }
        }
    }
}
