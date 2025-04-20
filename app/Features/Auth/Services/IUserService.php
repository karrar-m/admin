<?php

namespace App\Features\Auth\Services;

use App\Models\User;
use App\Features\Auth\Contracts\IUser;
use Illuminate\Support\Facades\Hash;
use App\Core\Result\TypedResult;

class IUserService implements IUser
{
    public function create(array $data): TypedResult
    {
        if (User::where('email', $data['email'])->exists()) {
            return TypedResult::validationFailure([
                'email' => 'البريد الإلكتروني مستخدم مسبقًا'
            ]);
        }

        if (User::where('username', $data['username'])->exists()) {
            return TypedResult::validationFailure([
                'username' => 'اسم المستخدم مستخدم مسبقًا'
            ]);
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'user',
        ]);

        return TypedResult::success($user);
    }
    public function update(int $id, array $data): TypedResult
    {
        $user = User::find($id);
    
        if (!$user)
            return TypedResult::validationFailure([
        'id' => 'المستخدم  غير  موجود']);
        $user->update($data);
        
        return TypedResult::success($user);
    }
    public function delete(int $id): TypedResult
    {
        $user = User::find($id);

        if (!$user) {
            return TypedResult::failure('المستخدم غير موجود');
        }

        $user->delete();

        return TypedResult::success($user);
    }
}