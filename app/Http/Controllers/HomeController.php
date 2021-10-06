<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratModel;
use App\Models\Takah;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }
        
        $last_five = SuratModel::orderBy('id', 'desc')->take(5)->get();
        return view('pages.home', compact('last_five'));
    }
}
