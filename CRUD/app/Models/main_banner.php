<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main_banner extends Model
{
    use HasFactory;

    protected $guarded = ['id','name','created_at','update_at'];
}
