<?php

namespace App\Observers;

use App\Models\curso;
use Illuminate\Support\Facades\Storage;

class cursoObserver
{
    /**
     * Handle the curso "created" event.
     *
     * @param  \App\Models\curso  $curso
     * @return void
     */
    public function creating(curso $curso)
    {
        if (! \App::runningInConsole()) {
            $curso->user_id = auth()->user()->id;
        }
    }


    /**
     * Handle the curso "deleted" event.
     *
     * @param  \App\Models\curso  $curso
     * @return void
     */
    public function deleting(curso $curso)
    {
        if($curso->image){
            Storage::delete($curso->image->url);
        }
    }

}