<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    //
    protected $table = 'test';
    protected $primaryKey = 'test_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $attributes = ['test_attribute1', 'test_attribute2'];
}
