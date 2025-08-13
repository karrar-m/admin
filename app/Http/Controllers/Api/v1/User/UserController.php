<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Features\Users\Actions\CreateUserAction;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private CreateUserAction $createUserAction
    ) {}

    public function store(CreateUserRequest $request): JsonResponse
    {
        // Execute the action to create a user
        $result = $this->createUserAction->execute($request);

        // Handle the result based on its success or failure
        if ($result->isSuccess) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $result->data,
            ], 201);
        }

        if ($result->errors) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $result->errors,
            ], 422);
        }

        return response()->json([
            'success' => false,
            'message' => $result->error,
        ], 500);
    }
}