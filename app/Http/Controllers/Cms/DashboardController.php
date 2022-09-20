<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\QrCode;
use App\Models\User;
use App\Models\SocialLink;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function dashboard()
    {
    	$user = Auth::user();

    	if($user->hasRole('Administrator')){

            $administrators = User::where('role', 'Administrator')->get();
            $users = User::where('role', 'User')->get();

            $qrcodes = QrCode::all();
            $used = QrCode::where('status', 'used')->get();
            $unused = QrCode::where('status', 'unused')->get();

            $socials = SocialLink::all();

    		return view('index', compact('user', 'administrators', 'users', 'qrcodes', 'used', 'unused', 'socials'));

    	} else if($user->hasRole('User')){

    		$qr_code = QrCode::where('user_id', $user->id)->where('status', 'used')->first();
    		return view('user-index', compact('qr_code'));

    	} else {
    		abort(403);
    	}
    }
}
