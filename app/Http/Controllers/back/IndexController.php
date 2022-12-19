<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\aday;
use App\Models\User;
use Auth;
class IndexController extends Controller
{
    //
    public function index()
    {
        //
        return view('back.index');
    }
    public function login()
    {
        return view('back.giris');
    }
    public function loginpost(Request $req)
    {
        $req->validate([

            'tc'=>'required',
            'password'=>'required',
        ]);
        if (Auth::guard('yonetim')->attempt(['tc' => $req->tc, 'password' => $req->password])) {
            // Authentication was successful...
            return redirect()->route('back.index');
        }
        else{
            return redirect()->route('back.giris')->with(['false'=>'Hata!']);
        }

    }
    public function logout()
    {
        Auth::guard('yonetim')->logout();
        return redirect()->route('back.giris');;
    }
    public function sifremiunuttum()
    {
        //
        return view('back.sifremiunuttum');
    }
    public function sifremiunuttumpost(Request $request)
    {

    	

        $varmi=User::where('tc',$request->tc)->where('cepno',$request->cepno)->count();
        
        if($varmi>0){
            $random_sifre=rand(100000,999999);
            $data=User::where('tc',$request->tc)->where('cepno',$request->cepno)->first();
            $data->password=bcrypt($random_sifre);
            $data->save();
            return redirect()->back()->with(['success'=>'Şifreniz: '.$random_sifre]);
        }
        else{
            return redirect()->back()->with(['danger'=>'sisteme kayıtlı kullanıcı bulunmamaktadır']);
        }
    }
}
