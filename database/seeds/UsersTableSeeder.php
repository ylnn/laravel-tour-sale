<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        if($users->count() <> 1) {
            \DB::table('users')->delete();
            \DB::table('users')->insert([
                'name' => 'Demo Admin',
                'email' => 'admin@demo.com',
                'password' => Hash::make('demo'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }


    }
}
