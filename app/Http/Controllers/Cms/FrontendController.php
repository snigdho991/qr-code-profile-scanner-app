<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use App\Models\QrCode;

use Session;
use Auth;

class FrontendController extends Controller
{
    public function frontend_index()
    {
        return view('frontend-pages.index');
    }

    public function frontend_profile(Request $request, $link)
    {
    	$qrcode = QrCode::where('link', $link)->first();
    	if($qrcode->profile_id != null){
            
            $user = User::find($qrcode->user_id);
            $profile = Profile::find($qrcode->profile_id);

    		return view('frontend-user.profile', compact('qrcode', 'user', 'profile'));

    	} else {
    		if(!Auth::user()){
    			return view('auth.register', compact('link'));
    		} else {
    			Session::flash("success", "This link is unused yet. Can't be accessed!");
        		return redirect()->back();
    		}
    	}
    }

    public function frontend_faq()
    {
        return view('frontend-pages.faq');
    }

    public function frontend_about()
    {
        return view('frontend-pages.about');
    }
}
