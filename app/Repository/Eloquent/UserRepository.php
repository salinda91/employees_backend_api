<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{

   public function userCreate($fields)
   {
     $user=User::create([
          'name'=>$fields['name'],
          'email'=>$fields['email'],
           'password'=>bcrypt($fields['password'])

      ]);
      return $user;
   }

   public function userGet($email)
   {
     return User::where('email', $email)->first();
   }
   
}