<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{   
    use HasFactory;

    protected $guarded = ['id','created_at','update_at'];
    //relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    // relacion 1a1 polimorfica
    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
    }
}
