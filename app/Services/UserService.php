<?php

namespace App\Services;

use App\Repository\UserRepositoryInterface;

class UserService{

    private $userRepository;

    /**
    * UserService constructor.
    *
    */
   public function __construct(UserRepositoryInterface $userRepository)
   {
        $this->userRepository = $userRepository;
   }

   public function userCreate($fields)
   {
     return $this->userRepository->userCreate($fields);
   }

   public function userGet($email)
   {
     return $this->userRepository->userGet($email);
   }
}