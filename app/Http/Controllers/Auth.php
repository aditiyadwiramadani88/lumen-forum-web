<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Ath;

class Auth extends BaseController{


    /**
     * @return response
     * @param Request
     */
    public function Register(Request $request) {

        $this->validate($request , [
                        'username' => 'required|unique:users',
                        'password' => 'required|min:8',
                        'email'    => 'required|email|unique:users'
         ]);

         $data =$request->only('username', 'email');
         $data['password'] = Hash::make($request->input('password'));
         app('db')->table('users')->insert($data);

         return response(['status' => 'sucess register']);

    }

    public function Login(Request $request){

    //    validate
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        // wrong username and password
        if (!$token = Ath::attempt($credentials)) {
            return response(['message' => 'Unauthorized'], 401);
        }

        // token
        return response(['token' => $token]);

    }

    /**
     * @return response
     */

    public function Logout() {

        // logout
        Ath::logout();
        return response(['status' => 'sucess logout']);
    }

}
