<?php
namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
   public function store($data);
   public function getRecord($orderBy, $direction, $where, $whereNot);
   public function update($id, $data);
   public function all(): Collection;
}