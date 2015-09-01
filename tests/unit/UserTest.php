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
        $name = 'John Doe';
        $password = Hash::make('password');
        User::register(['email' => $email, 'password' => $password, 'name' => $name]);
        $this->tester->seeRecord('users', ['email' => $email, 'password' => $password, 'name' => $name]);
    }
}
