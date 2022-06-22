<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_emp',
        'firstname',
        'lastname',
        'department_id',
        'allow_access'
    ];

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function access()
    {
        return $this->hasMany(Access::class, 'emp_id', 'id');
    }
}
