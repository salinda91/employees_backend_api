<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 
    'emp_id', 'designation_id', 'department_id', 'join_date', 
    'address', 'phone', 'date_of_birth', 'country_id', 'passport_number'];

    public function designation()
    {
        return $this->hasOne('App\Models\Designation', 'id', 'designation_id');
    }

    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function personalDetail()
    {
        return $this->belongsTo('App\Models\EmployeesPersonalDetail');
    }
}
