<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computadora extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'computadoras';

    protected $fillable = ['name','description','sunrise','is_online'];
	
}
