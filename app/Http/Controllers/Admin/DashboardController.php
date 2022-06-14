<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // return intertia();
        return Inertia::render('Admin/Dashboard', [
            // 'event' => $event->only(
            //     'id',
            //     'title',
            //     'start_date',
            //     'description'
            // ),
        ]);
    }
}
