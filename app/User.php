<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use App\Social;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function social() {
        return $this->hasMany('App\Social', 'user_id');
    }


    /**
	* Returns the user Gravatar image url.
	*
	* @return string
	*/
	public function gravatar($size = null)
	{
		    return "//gravatar.com/avatar/".md5(strtolower(trim($this->email)))."";
	}


    /*
    * Get social accounts associated with this user
    */
    public static function saveSocialAccount($socialUser, $provider) {

        // Check to see if a user exists in the users table first
        $user =  User::where('email', '=', $socialUser->getEmail())->first();

         // There is NOT a matching email address in the user table
         if (!$user) {
             $user = new User;
             $user->email = $socialUser->getEmail();
             $user->name = $socialUser->getName();
             if (!$user->save()) {
                 return false;
             }
         }

        $social = $user->social()->firstOrNew
            (
            ['user_id' => $user->id,
            'service'=>$provider,
            'uid' => $socialUser->getId()
            ]);

            $social->access_token = $socialUser->token;
            $social->save();


        return $user;


    }

    /*
    * Check whether they have social logins stored
    */
    public static function checkForSocialLoginDBRecord($user, $provider) {
        return DB::table( 'social' )
         ->where( 'access_token', '=', $user->token )
         ->where('service','=',$provider)
         ->get();

    }
}
