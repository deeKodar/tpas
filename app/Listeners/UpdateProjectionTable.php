<?php

namespace App\Listeners;

use App\Events\ProjectionAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProjectionTable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectionAdded  $event
     * @return void
     */
    public function handle(ProjectionAdded $event)
    {
        $this->calculateProjection($event);
    }

    protected function calculateProjection(ProjectionAdded $event) {


        $projection = Projection::where('school_id',$event->school_id)
                        ->where('subject_id')

    }

}
