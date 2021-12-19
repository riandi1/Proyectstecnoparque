<?php

namespace App\Policies;

use App\Models\curso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class cursoPolicy
{
    use HandlesAuthorization;

    public function author(User $user, curso $curso)
    {
        if ($user->id == $curso->user_id) {
            return true;
        }else{
            return false;
        }
    }
    public function published(?User $user, curso $curso)
    {
        if ($curso->status == 2) {
            return true;
        }else{
            return false;
        }
    }
}
