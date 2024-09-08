<?php
namespace App\Services\Users;

use App\Models\User;

class SaveUserInfoService
{
    public static function save(array $data, $id = null)
    {
        if ($id === null) {
            // Create a new user
            $user = User::create($data);
        } else {
            // Update an existing user
            $user = User::findOrFail($id);
            $user->update($data);
        }

        return $user;
    }
}
