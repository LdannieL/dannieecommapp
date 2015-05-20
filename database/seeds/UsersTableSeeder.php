<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\models\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $user->firstname = 'Dannie';
		$user->lastname = 'Lap';
		$user->email = 'admin@ecomm.com';
		$user->password = Hash::make('admin123');
		$user->telephone = '5557771234';
		$user->admin = 1;
		$user->save();
    }
}
