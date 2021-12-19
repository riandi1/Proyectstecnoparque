<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = ['name','email','two_factor_secret','two_factor_recovery_codes','current_team_id','profile_photo_path'];
	
}
