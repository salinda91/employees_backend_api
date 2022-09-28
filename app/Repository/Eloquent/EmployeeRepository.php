<?php

namespace App\Repository\Eloquent;

use App\Models\Employee;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Support\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{

   public function all() : Collection
   {
        $employees = Employee::get();
        
        return $employees;
   }

   public function store($data)
   {
        return Employee::create($data);

   }
   
}