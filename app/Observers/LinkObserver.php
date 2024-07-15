<?php

namespace App\Observers;
use App\Models\Link;
use Carbon\Carbon;

class LinkObserver
{
    /**
     * Handle the Link "created" event.
     */
    public function created(Link $link)
    {
        if (!$link->time_expire) {
            $link->time_expire = Carbon::now()->addDay();
        }
    }

    /**
     * Handle the Link "updated" event.
     */
    public function updated(Link $link)
    {
        //
        if (Carbon::now()->greaterThanOrEqualTo($link->time_expire)) {
            $link->expire = true;
        }
    }

    /**
     * Handle the Link "deleted" event.
     */
    public function deleted(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "restored" event.
     */
    public function restored(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "force deleted" event.
     */
    public function forceDeleted(Link $link): void
    {
        //
    }
}
