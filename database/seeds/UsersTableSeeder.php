<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\User::class,20)->create();

        App\User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt(1234),
            'dni'=>12345678,
            'categoria'=>'investigador',
            'rol'=>1,

        ]);

        App\User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt(1234),
            'dni'=>12345688,
            'categoria'=>'investigador',
            

        ]);
    }
}
