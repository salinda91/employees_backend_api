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

   //user Registraion
   public function userStore($request)
   {

        //settingup data to store in user table
        $data = [
            'name'=> $request['name'],
            'user_name'=> $request['user_name'],
            'sponser_user_name'=> $request['sponser_user_name'],
            'position'=> $request['position']
        ];   
        $savedUser = $this->userRepository->store($data);

        $where = ['sponser_user_name'=>$savedUser->sponser_user_name, 'position'=>$savedUser->position];
        
        $lastRecord = $this->userRepository->getRecord('id','DESC',$where,$savedUser->id);

        $level =  $lastRecord ? $lastRecord->level + 1 : 1;
        
        $savedUser = $this->userRepository->update($savedUser->id, ['level'=>$level]);


   }

   public function get()
   {
        return $this->userRepository->all();
   }

}