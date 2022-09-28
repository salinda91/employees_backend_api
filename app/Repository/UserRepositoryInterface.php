<?php
namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function userCreate($data);
   public function userGet($email);
}