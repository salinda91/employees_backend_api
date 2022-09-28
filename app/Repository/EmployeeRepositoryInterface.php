<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
   public function all() :Collection;
   public function store($data);
}