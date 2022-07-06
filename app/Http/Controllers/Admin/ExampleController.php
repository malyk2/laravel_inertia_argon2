<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExampleController extends Controller
{
    public function dashboard()
    {
        return inertia('Admin/Examples/Dashboard');
    }

    public function tables()
    {
        return inertia('Admin/Examples/Tables');
    }

    public function billing()
    {
        return inertia('Admin/Examples/Billing');
    }

    public function vr()
    {
        return inertia('Admin/Examples/Vr');
    }

    public function rtl()
    {
        return inertia('Admin/Examples/Rtl');
    }

    public function profile()
    {
        return inertia('Admin/Examples/Profile');
    }

    public function signin()
    {
        return inertia('Admin/Examples/Signin');
    }

    public function signup()
    {
        return inertia('Admin/Examples/Signup');
    }
}
