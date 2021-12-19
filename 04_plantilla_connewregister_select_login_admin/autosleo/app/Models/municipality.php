<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{
    use HasFactory;

    // relacion uno a muchos
    public function user()
    {
        return $this->hasMany(User::class);
    }

    // relacion uno a muchos inversa
    public function departaments()
    {
        return $this->belongsTo(departament::class);
    }
}
