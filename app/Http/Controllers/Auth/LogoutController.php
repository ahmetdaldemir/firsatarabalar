<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{

    public function __construct()
    {
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->to('login');
    }
}