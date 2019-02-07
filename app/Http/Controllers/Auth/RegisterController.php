<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:100'],
            'lastname'  => ['required', 'string', 'max:100'],
            'gender'    => ['required', 'string'],
            'code_melli'=> ['required', 'integer', 'digits_between:8,10', 'unique:users'],
            'mobile'    => ['required', 'integer', 'digits_between:10,11'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

/*
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'code_melli' => $data['code_melli'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['code_melli']),
        ]);
        $user->flights()->sync($user->id);
        return $user;
    }
*/
}
