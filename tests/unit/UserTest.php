<?php
use App\User;
use Illuminate\Support\Facades\Hash;
class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    public function testRegister()
    {

        $email = 'johndoe@example.com';
        $first_name = 'John';
        $last_name = 'Doe';
        $slug = 'johndoe';
        $password = Hash::make('password');

        User::register(['email' => $email, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'slug' => $slug]);
        $this->tester->seeRecord('users', ['email' => $email, 'password' => $password]);
        
    }


}
