<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExampleController extends Controller
{
    public function tables()
    {
        return inertia('Admin/Tables');
    }
}
