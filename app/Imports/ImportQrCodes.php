<?php

namespace App\Imports;

use App\Models\QrCode;
use Maatwebsite\Excel\Concerns\ToModel;

use Auth;
use Session;

class ImportQrCodes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] != null){
            $find_qr = QrCode::where('link', $row[1])->first();

            if ($find_qr) {
                Session::flash('error', 'Any qr code\'s link already exists !');
                Session::flash('qrerror-message', 'Any of the uploaded qr codes\' link already exists ! File NOT uploaded.'); 
            } else {
                $qrcode = QrCode::create([
                    'name'             => $row[0],
                    'link'             => $row[1],
                    'administrator_id' => Auth::id(),
                ]);

                $type = 'vertical';
                \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)
                  ->gradient(0, 0, 128, 0, 0, 205, $type)
                  ->format('svg')
                  ->generate(url('/'.$qrcode->link), public_path('assets/uploads/qr-codes/'.$qrcode->link.'.svg'));

                return $qrcode;
            }
        } else {
            $new_link = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 6);
            $chk_link = QrCode::where('link', $new_link)->first();

            if($chk_link){
                Session::flash('error', 'Any qr code\'s link already exists !');
                Session::flash('qrerror-message', 'Any of the uploaded qr codes\' link already exists ! File NOT uploaded.'); 
            } else {
                $qrcode = QrCode::create([
                    'name'             => $row[0],
                    'link'             => $new_link,
                    'administrator_id' => Auth::id(),
                ]);

                $type = 'vertical';
                \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)
                  ->gradient(0, 0, 128, 0, 0, 205, $type)
                  ->format('svg')
                  ->generate(url('/'.$new_link), public_path('assets/uploads/qr-codes/'.$new_link.'.svg'));

                return $qrcode;
            }
        }
    }
}
