<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nnews extends Model
{
    //
    use HasFactory;
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['title', 'slug', 'body', 'hidden'];
}
