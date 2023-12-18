<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [

              'nom' => 'Bugler',
              'prenom'=> "Christ",
              'email' => 'admin@gmail.com',
              'password' => 'bug2.0#@',
              'admin' => 1,
            ],
            [
                'nom' => 'Njoya',
                'prenom'=> "MHD",
                'email' => 'mhd@gmail.com',
                'password' => 'mhdnjoya7#',
                'admin' => 0,
            ],
             [
              'nom' => 'Client',
              'prenom' => 'Annonceur',
              'email' => 'client@gmail.com',
              'password' => 'client_annonce',
              'admin' => 0,
            ]
          ];


          foreach($users as $user)
          {
              User::create([
               'nom' => $user['nom'],
               'prenom'=>$user['prenom'],
               'email' => $user['email'],
               'password' => Hash::make($user['password']),
               'admin' => $user['admin'],
             ]);
           }
    }   
}

