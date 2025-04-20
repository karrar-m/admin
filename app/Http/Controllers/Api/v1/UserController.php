<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Features\Auth\Contracts\IUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUser $userService;

    public function __construct(IUser $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json(User::all());
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userService->create($validated);

        return response()->json([
            'user' => $user,
            'message' => 'User created successfully'
        ], 201);
    }

    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($id, $request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        return $this->userService->delete($id);
    }
}