<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data=User::find(Auth::id())->first();
        if($data->rol==0){
                $user=User::with('adayinfo')->where('id',Auth::id())->first();
        }
        elseif($data->rol=1){
            $user=User::with('ogrenciinfo')->where('id',Auth::id())->first();
        }
        elseif($data->rol=2){
            $user=User::with('veliinfo')->where('id',Auth::id())->first();
        }
        elseif($data->rol=3){
            $user=User::with('ogretmeninfo')->where('id',Auth::id())->first();
        }


        return view('home',$user);
    }
}
