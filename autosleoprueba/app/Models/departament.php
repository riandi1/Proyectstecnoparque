<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departament extends Model
{
    use HasFactory;

    // relacion uno a muchos
    public function municipality()
    {
        return $this->hasMany(municipality::class);
    }
}
