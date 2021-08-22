<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caroulsel extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_url',
        'status'=>'none'
    ];
}
