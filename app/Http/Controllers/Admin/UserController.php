<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Http\Resources\Admin\Users\ListItem as ListItemResource;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = User::where('id', '<>', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        return inertia('Admin/Users/Index', [
            'users' => ListItemResource::collection($users),
        ]);
    }
}
