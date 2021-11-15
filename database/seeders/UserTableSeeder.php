<?php

namespace Database\Seeders;

use App\Models\aprendices;
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
            'password'=> Hash::make('SENAaprendiz2021'),
        ]);
        $aprendiz = aprendices::create([
            'genero' => 'Masculino',
            'ficha' => '2067469',
            'users_id'=>$user->id,
        ]);
        $user->assignRole('aprendiz');
    }
}
