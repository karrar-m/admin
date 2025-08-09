<?php

namespace App\Features\Users\Actions;

use App\Models\User;
use App\Common\Enums\UserType;
use App\Common\Result\TypedResult;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
  
    public function execute(array|CreateUserRequest $data): TypedResult
    {
        if ($data instanceof CreateUserRequest) {
            $validatedData = $data->validated();
        } else {

            $request = new CreateUserRequest();
            $validator = \Illuminate\Support\Facades\Validator::make($data, $request->rules(), $request->messages());
            
            if ($validator->fails()) {
                return TypedResult::validationFailure($validator->errors()->toArray());
            }
            
            $validatedData = $validator->validated();
        }

        try {

            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'username' => $validatedData['username'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'user_type' => $validatedData['user_type'],
            ]);

            return TypedResult::success($user);
        } catch (\Exception $e) {
            return TypedResult::failure('Failed to create user: ' . $e->getMessage());
        }
    }
}
