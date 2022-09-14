<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carmechanic extends Model
{
    use HasFactory;
    protected $fillable = [
        'mechanic_id','car_id','categorie_id'
    ];

    
}
