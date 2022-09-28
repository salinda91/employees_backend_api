<?php

namespace App\Services;

use App\Repository\EmployeeRepositoryInterface;

class EmployeeService{

    private $employeeRepository;

    /**
    * UserService constructor.
    *
    */
   public function __construct(EmployeeRepositoryInterface $employeeRepository)
   {
        $this->employeeRepository = $employeeRepository;
   }

   public function getAllEmployees($options=[])
   {
     return $this->employeeRepository->all();
   }

   public function storeEmployees($request)
   {
     return $this->employeeRepository->store($request);
   }


}