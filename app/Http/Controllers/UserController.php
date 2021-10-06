<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\Session;

Use App\Models\UsersModel;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->session()->get('LoggedIn')) {
            return redirect('/');
        }
        
        return view('pages.login');
        
    }

    public function loginPost(Request $request)
    {
        if(!empty($request->nik)) {
            $nik = $request->nik;
            $password = $request->password;

            $data = UsersModel::where('nik', $nik)->first();
            if($data) {
                if(Hash::check($password, $data->password)) {
                    Session::put('nama', $data->nama);
                    Session::put('nik', $data->nik);
                    Session::put('last_login', $data->last_login);
                    Session::put('LoggedIn', true);

                    return redirect('/');
                }else{
                    return redirect('login')->with('alert', 'Nik atau Password Anda salah!');
                }
            }else{
                return redirect('login')->with('alert', 'Nik atau Password Anda salah!');
            }
        }else{
            return redirect('login')->with('alert', 'Nik atau Password tidak boleh kosong!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
