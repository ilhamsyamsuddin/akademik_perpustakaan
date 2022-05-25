<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class zoom_class extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'meeting_id','topic','start_at','duration','password','start_url','join_url'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }   
}
