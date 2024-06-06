<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

    public function login() {
        if (Auth::check()) 
        return Redirect::route('dashboard');

    return view('/login');
    }
    
    public function logout(Request $req) {
        Auth::logout();
        $this->guard()->logout();
        $req->session()->invalidate();
        return redirect('/');
    }
    
    public function login_post(Request $req) {
        $cek = DB::table('user')
                ->where("nikPeg", $req->username)
                ->where("pass", md5($req->password))
                ->where('levelUser', 'Admin')
                ->count();

        $dt = DB::table('user')
                ->where("nikPeg", $req->username)
                ->where("pass", md5($req->password))
                ->first();

        if ($cek > 0) {
            session([
                'id_user' => $dt->idUser,
            ]);
            // Auth::guard("admin")->LoginUsingId($dt->idUser);
            return '1';
        } else {
            return '2';
        }
    }

}
