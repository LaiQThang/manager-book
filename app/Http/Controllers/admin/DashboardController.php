<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //
    
    public function index(){
        
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }

    public function logout(){
        session_destroy();
        return redirect(route('auth.index'));
    }

    
}
