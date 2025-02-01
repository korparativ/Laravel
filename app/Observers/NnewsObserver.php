<?php

namespace App\Observers;

use App\Models\Nnews;
use Illuminate\Support\Str;

class NnewsObserver
{
    /**
     * Handle the Nnews "created" event.
     */
    public function saving(Nnews $nnews): void
    {
        //
        $nnews->slug = Str::slug($nnews->title);
    }
}
