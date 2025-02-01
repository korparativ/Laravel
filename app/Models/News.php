<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class News extends Model
{
    //
    use HasFactory;
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = ['title', 'slug', 'body'];
    protected static function boot(){
        parent::boot();
        static::updating(function(News $news){
            Log::info('Updating news ' . $news);
        });
    }
}
