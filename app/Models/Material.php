<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'title','content','document','video'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }    
}
