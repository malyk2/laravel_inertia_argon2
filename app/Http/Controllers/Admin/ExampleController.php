<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExampleController extends Controller
{
    public function dashboard()
    {
        return inertia('Admin/Dashboard');
    }

    public function tables()
    {
        return inertia('Admin/Tables');
    }

    public function billing()
    {
        return inertia('Admin/Billing');
    }

    public function vr()
    {
        return inertia('Admin/Vr');
    }

    public function rtl()
    {
        return inertia('Admin/Rtl');
    }

    public function profile()
    {
        return inertia('Admin/Profile');
    }

    public function signin()
    {
        return inertia('Admin/Signin');
    }

    public function signup()
    {
        return inertia('Admin/Signup');
    }
}
