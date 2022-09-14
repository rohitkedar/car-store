<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'number','owner_id','categorie_id','model','color','engine_type'
    ];

    public function owner()  
    {  
        return $this->belongsTo('App\Models\Owner');  
    }  
    public function categorie()  
    {  
        return $this->belongsTo('App\Models\Categorie');  
    }
}
