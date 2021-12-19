<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'municipalityid',
        'rolid',
        'address',
        'telephone',
        'cellphone',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // relacion uno a muchos inversa
    // public function rol()
    // {
    //     return $this->belongsTo(rol::class);
    // }

    // relacion uno a muchos inversa
    public function municipality()
    {
        return $this->belongsTo(municipality::class);
    }
    public function adminlte_image()
    {
    
        
        if (Auth::user()->gender == 1) {
            return 'https://cdn-i-media.kidsna.com/article/7804/xprlwJzdxUffxA0dmnyROkGHNy9HU2EUDiBMNYrVdieYAT968J6iKVL40OhmYGdL?d=5d44062f';
        }
        else {
            return 'https://www.beaumont-group.fr/wp-content/uploads/2017/03/Veroniquea-300x300.jpg';
        }

    }
    public function adminlte_profile_url()
    {
        return route('profile.show');
    }
}
