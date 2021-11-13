<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Instructor',
            'email'=>'Instructor@gmail.com',
            'password'=> Hash::make('password'),
        ]);
        $user->assignRole('instructor');

        $user = User::create([
            'name'=>'Aprendiz',
            'email'=>'Aprendiz@gmail.com',
            'password'=> Hash::make('password'),
        ]);
        $user->assignRole('aprendiz');
    }
}
