<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use  RegistersUsers;

    public function showregister(){  
        return $this->showRegistrationForm();   
    }

    public function postregister(){
        Log::info("helloooo register");
        Log::info(request());
        $request=request();
        event(new Registered($user = User::create(
            [
            'role_id' => '2',
            'avatar' => $request->avatar,
            'settings' => NULL,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]
        )));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());      
    }


    public function logout()
    {
      Auth::logout();
      return  Voyager::view('voyager::login');
    }
}
