<?php

namespace App\Repository\Eloquent;

use App\Models\Employee;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Support\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{

   public function all($options) : Collection
   {
     $search = null;
     if(array_key_exists('search',$options)){
          $search = $options['search'];
     }
     $employee = Employee::with(['designation','department','country']);
     if(!empty($search)){
          $employee->where('first_name','LIKE','%'.$search.'%')
               ->orWhere('last_name','LIKE','%'.$search.'%')
               ->orWhere('emp_id','LIKE','%'.$search.'%');
     }
     return $employee->get();
        
   }

   public function store($data)
   {
        return Employee::create($data);

   }

   public function single($id){
          return Employee::where('id',$id)
               ->with(['designation','department','country'])
               ->first();
   }
   
   public function update($data,$id)
   {
          return Employee::where('id',$id)->update($data);
   }

   public function hardDelete($id)
   {
          return Employee::destroy($id);
   }

   public function softDelete($id)
   {
          return Employee::where('id',$id)->update(['deleted'=>1]);
   }
}