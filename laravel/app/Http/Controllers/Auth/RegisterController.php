<?php

namespace App\Http\Controllers\Auth;

use App\Actions\ImageModelSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Services\Users\SaveUserInfoService;
use App\Traits\upload_image;

class RegisterController extends Controller
{
    use upload_image;

    public function index()
    {
        return view('auth.register');
    }

    public function save(RegisterFormRequest $request)
    {
        $userData = $request->validated();
        $userData['type'] = $request->input('type', 'client');

        $file = $request->file('image');
        $image_name = $file ? $this->uploadImage($file, 'users') : 'default.png';

        // Hash password
        $userData['password'] = bcrypt($userData['password']);

        // Save user data
        $user = SaveUserInfoService::save($userData);

        // Save image data
        ImageModelSave::make($user->id, 'User', $image_name);

        return redirect()->back()->with('success', 'You registered successfully!');
    }
}
