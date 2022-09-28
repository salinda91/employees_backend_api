<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
   public function all($options) :Collection;
   public function store($data);
   public function single($id);
   public function update($data,$id);
   public function hardDelete($id);
   public function softDelete($id);
}