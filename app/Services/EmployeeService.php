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

   public function getSingleEmployee($id)
   {
    return $this->employeeRepository->single($id);
   }

   public function updateEmployees($request,$id)
   {
    return $this->employeeRepository->update($request,$id);
   }

   public function hardDeleteEmployee($id)
   {
    return $this->employeeRepository->hardDelete($id);
   }

   public function softDeleteEmployee($id)
   {
    return $this->employeeRepository->softDelete($id);
   }

   public function isExistsEmployee($id)
   {
    if($this->employeeRepository->single($id)){
      return true;
    }else{
      return false;
    }    
   }

}