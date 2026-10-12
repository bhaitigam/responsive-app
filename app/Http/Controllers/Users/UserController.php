<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function SignUp()
    {
        return view('responsive.signup');
    }

    public function VerifyOtp()
    {
        return view('responsive.verify-otp');
    }

    public function SignIn()
    {
        return view('responsive.signin');
    }
    public function forgotPassword()
    {
        return view('responsive.forgot-password ');
    }
    public function changePassword()
    {
        return view('responsive.change-password');
    }
}
