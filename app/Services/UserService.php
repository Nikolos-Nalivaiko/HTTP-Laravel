<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService {

    public function checkPasswordUnique(string $password) {

        $users = User::all();
        foreach($users as $user) {
            if(Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'password' => 'Цей пароль вже використовується іншим користувачем.',
                ]);
    
            }
        }

    }

    public function createUser(array $data, string $userType) {

        if($userType == 'user') {
            return User::create([
                'password' => Hash::make($data['password']),
                'login' => $data['login'],
                'name' => $data['name'],
                'middle_name' => $data['middleName'],
                'last_name' => $data['lastName'],
                'region_id' => $data['region_id'],
                'city_id' => $data['city_id'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'type' => $userType,
            ]);
        } else {
            return User::create([
                'password' => Hash::make($data['password']),
                'login' => $data['login'],
                'name' => $data['name'],
                'region_id' => $data['region_id'],
                'city_id' => $data['city_id'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'type' => $userType,
            ]);
        }
    }

    public function createAvatar($avatarFile, User $user) :Void
    {
        $path = $avatarFile->store('avatars', 'public');

        Avatar::create([
            'user_id' => $user->id,
            'path' => $path,
            'filename' => $avatarFile->getClientOriginalName(),
            'mime_type' => $avatarFile->getClientMimeType(),
            'size' => $avatarFile->getSize(),
        ]);
    }

}