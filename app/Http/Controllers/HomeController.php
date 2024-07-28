<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype != 'admin') {
    
            return redirect('dashboard');
        }

}


}
