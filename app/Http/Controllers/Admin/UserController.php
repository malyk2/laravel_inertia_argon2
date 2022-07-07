<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Http\Resources\Admin\Users\ListItem as ListItemResource;
use App\Http\Resources\Admin\Users\DetailItem as DetailItemResource;
use App\Http\Requests\Admin\Users\Create as CreateRequest;
use App\Http\Requests\Admin\Users\Update as UpdateRequest;

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
            ->paginate(10);

        return inertia('Admin/Users/Index', [
            'users' => ListItemResource::collection($users),
        ]);
    }

    public function createForm(Request $request)
    {
        return inertia('Admin/Users/Form', ['user' => null,]);
    }

    public function create(CreateRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()->route('users.index');
    }

    public function show(User $user, Request $request)
    {
        return inertia('Admin/Users/Form', [
            'user' => new DetailItemResource($user),
        ]);
    }

    public function update(User $user, UpdateRequest $request)
    {
        $this->userService->update($user, $request->validated());

        return redirect()->route('users.index');
    }
}
