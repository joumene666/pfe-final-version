<?php

namespace App\Observers;

use App\Models\Structer;

class StructerObserver
{
    /**
     * Handle the Structer "created" event.
     *
     * @param  \App\Models\Structer  $structer
     * @return void
     */
    public function created(Structer $structer)
    {
        //
    }

    /**
     * Handle the Structer "updated" event.
     *
     * @param  \App\Models\Structer  $structer
     * @return void
     */
    public function updated(Structer $structer)
    {
        $structer->recordActivity('updated_Structer');
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updating(Structer $structer)
    {
        $structer->old = $structer->getOriginal();
    }

    /**
     * Handle the Structer "deleted" event.
     *
     * @param  \App\Models\Structer  $structer
     * @return void
     */
    public function deleted(Structer $structer)
    {
        //
    }

    /**
     * Handle the Structer "restored" event.
     *
     * @param  \App\Models\Structer  $structer
     * @return void
     */
    public function restored(Structer $structer)
    {
        //
    }

    /**
     * Handle the Structer "force deleted" event.
     *
     * @param  \App\Models\Structer  $structer
     * @return void
     */
    public function forceDeleted(Structer $structer)
    {
        //
    }
}
