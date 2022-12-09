<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\AddressService;
use App\Http\Services\UserService;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'adresses.street' => ['required', 'string'],
            'adresses.number' => ['nullable', 'integer'],
            'adresses.complement' => ['nullable', 'string'],
            'adresses.neighborhood' => ['required', 'string'],
            'adresses.city' => ['required', 'string'],
            'adresses.state' => ['required', 'string'],
            'adresses.zipcode' => ['required', 'max_digits:9']
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
        try {
            DB::beginTransaction();

            $user = app(UserService::class)->create($data);

            app(AddressService::class)->create($user, $data['adresses']);

            DB::commit();

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollBack();
        }

        $user->notify(new WelcomeEmailNotification($user));

        return $user;
    }
}
