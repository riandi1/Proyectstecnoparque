<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    // relacion uno a muchos
    public function cursos()
    {
        return $this->hasMany(curso::class);
    }
}
