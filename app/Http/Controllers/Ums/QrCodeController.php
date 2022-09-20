<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\QrCode;

use App\Imports\ImportQrCodes;
use Maatwebsite\Excel\Facades\Excel;

use Session;
use Auth;

use App\Models\User;

class QrCodeController extends Controller
{
	public function __construct(QrCode $qrcode)
    {
    	$this->middleware(['role:Administrator'])->except(['manage_qrcode']);
        $this->qrcode = $qrcode;
    }

    public function generate_qrcode()
    {
    	return view('qr-code.generate');
    }

    public function store_qrcode(Request $request)
    {
    	if($request->link != null) {
	    	$this->validate($request, [
	            'name' => 'required',
	            'link' => 'size:6|alpha_num|unique:qr_codes',
	        ]);

	    	$type = 'vertical';
	    	\SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)
	    		  ->gradient(0, 0, 128, 0, 0, 205, $type)
	              ->format('svg')
	              ->generate(url('/'.$request->link), public_path('assets/uploads/qr-codes/'.$request->link.'.svg'));

	        $code = QrCode::create([
	            'name'             => $request->name,
	    		'link'             => $request->link,
	    		'administrator_id' => Auth::id(),
	    	]); 

	    	Session::flash('success', 'QR Code Generated Successfully !');
        	return redirect()->route('qrcode.generate');

	    } else {
	    	$this->validate($request, [
	            'name' => 'required',
	        ]);

	    	$new_link = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 6);

	    	$chk_link = QrCode::where('link', $new_link)->first();

	    	if($chk_link){
	    		Session::flash('error', 'QR Code Already Exists! Try again later.');
        		return redirect()->route('qrcode.generate');
	    	} else {
	    		$type = 'vertical';
		    	\SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)
		    		  ->gradient(0, 0, 128, 0, 0, 205, $type)
		              ->format('svg')
		              ->generate(url('/'.$new_link), public_path('assets/uploads/qr-codes/'.$new_link.'.svg'));

		        $code = QrCode::create([
		            'name'             => $request->name,
		    		'link'             => $new_link,
		    		'administrator_id' => Auth::id(),
		    	]);

		    	Session::flash('success', 'QR Code Generated Successfully !');
        		return redirect()->route('qrcode.generate');
        	}
	    }

    }

    public function unused_qrcode()
    {
    	$unused_codes = QrCode::where('status', 'unused')->orderBy('created_at', 'desc')->get();
    	return view('qr-code.unused', compact('unused_codes'));
    }

    public function used_qrcode()
    {
    	$used_codes = QrCode::where('status', 'used')->orderBy('created_at', 'desc')->get();
    	return view('qr-code.used', compact('used_codes'));
    }

    public function manage_qrcode($link)
    {
    	$qr_code = QrCode::where('link', $link)->first();

    	$admin = User::find($qr_code->administrator_id);
    	$adminAvatar = $this->qrcode->avatarLetter($admin->name);

    	$finduser = User::find($qr_code->user_id);

    	if($qr_code->user_id != null){
    		
    		$user = User::find($qr_code->user_id);
	    	$userAvatar = $this->qrcode->avatarLetter($user->name);
    		
    		if(Auth::user()->role == 'User') {
	    		if($qr_code->user_id == Auth::id()){
		    		return view('qr-code.manage', compact('qr_code', 'admin', 'adminAvatar', 'user', 'userAvatar'));
		    	} else {
		    		abort(404);
		    	}
		    } else {
		    	return view('qr-code.manage', compact('qr_code', 'admin', 'adminAvatar', 'user', 'userAvatar'));
		    }
	    }

	    return view('qr-code.manage', compact('qr_code', 'admin', 'adminAvatar'));

    }

    public function upload_qrcode_file(Request $request)
    {
		$this->validate($request, [
			'file' => 'required',
		]);

		$file = $request->file('file');

		$fileSize = $file->getSize();
		$extension = $file->getClientOriginalExtension();

      	$valid_extension = array("csv", "xlsx");

      	if(in_array(strtolower($extension), $valid_extension)) {
			if($fileSize <= 2097152) {

				Excel::import(new ImportQrCodes, $file);
		        
		        Session::flash('success', 'QRCodes File Imported Successfully !');
	        	return redirect()->route('qrcode.unused');

	        } else {
	        	Session::flash('error', 'File too large. File must be less than 2MB.');
	        	return redirect()->back();
	        }
	    } else {
	    	Session::flash('error', 'Invalid Format !');
	        return redirect()->back();
	    }

	}

}
