<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Region;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function select() {

        return view('register.select');

    }

    public function indexUser() {

        $regions = Region::all();

        return view('register.indexUser', compact('regions'));

    }

    public function indexCompany() {
        
        $regions = Region::all();

        return view('register.indexCompany', compact('regions'));

    }

    public function storeUser(StoreUserRequest $request) {

        $validated = $request->validated();

        $this->userService->checkPasswordUnique($validated['password']);
        
        $userType = 'user';

        $user = $this->userService->createUser($validated, $userType);

        if($request->file('avatar')) {
            $this->userService->createAvatar($request->file('avatar'), $user);
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    public function storeCompany(StoreCompanyRequest $request) {

        $validated = $request->validated();


        $this->userService->checkPasswordUnique($validated['password']);

        
        $userType = 'company';


        $user = $this->userService->createUser($validated, $userType);


        if($request->file('avatar')) {
            $this->userService->createAvatar($request->file('avatar'), $user);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}