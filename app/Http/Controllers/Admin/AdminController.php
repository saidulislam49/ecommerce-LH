<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.admin_home');
    }

    public function admin_logout()
    {
        Auth::logout();
        $notification = array('message' => 'You are logged out!!', 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notification);
    }
}
