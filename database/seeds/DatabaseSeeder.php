<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //criar um usuario de teste para autenticar
        factory('App\User')->create (
            [
                'name' => 'Bart Simposon',
                'email' => 'bartsimpson@gmail.com',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]
        );

        // $this->call('UserTableSeeder');
        //$this->call('TagTableSeeder');
        $this->call('Posts');

        Model::reguard();
    }
}
