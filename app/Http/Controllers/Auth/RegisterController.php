<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\TypeValidationRule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        // dd(request()->type);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',
            'numero' => 'required',
            'numeroPieceIdentiter' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'rue' => 'required',
            'profil_id' => ['required', new TypeValidationRule],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'dateNaissance' => $data['dateNaissance'],
            'sexe' => $data['sexe'],
            'numero' => $data['numero'],
            'numeroPieceIdentiter' => $data['numeroPieceIdentiter'],
            'pays' => $data['pays'],
            'ville' => $data['ville'],
            'rue' => $data['rue'],
            'profil_id' => $data['profil_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
