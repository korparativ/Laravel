<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['first_name', 'last_name', 'address', 'email', 'workData', 'textarea'];
}
