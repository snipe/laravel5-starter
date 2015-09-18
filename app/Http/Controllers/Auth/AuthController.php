<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use Input;
use Redirect;
use Config;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Redirect the user to the OAuth authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();

            if ($user->getEmail()=='') {
                return view('auth/email-required')->with('user',$user);
            }

            if ($getUser = User::checkForSocialLoginDBRecord($user, $provider)) {
                Auth::login($getUser);
                return redirect('/')->with('success','You have been logged in!');
            } else {
                $newUser = User::saveSocialAccount($user, $provider);
                Auth::login($newUser);
                return redirect('/')->with('success','Welcome aboard!');
            }

        } catch  (Exception $e) {
            return redirect('/')->with('error','We couldn\'t log you in :(');
        }



    }

    /**
     * Prompt the user for an email address
     *
     * @return Response
     */
    public function getUpdateEmail()
    {
        return view('auth/email-required')->with('user',$user);
    }


    /**
     * Save the user's email address
     *
     * @return Response
     */
    public function postUpdateEmail()
    {
        return Socialite::driver($provider)->redirect();
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|not_blacklisted',
            'password' => 'required|confirmed|min:8'
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
