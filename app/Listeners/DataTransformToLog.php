<?php

namespace App\Listeners;

use App\Events\DataTransForm;
use App\Service\Log\Log;

class DataTransformToLog
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
     * @param  DataTransform  $event
     * @return void
     */
    public function handle(DataTransform $event)
    {
        $data = $event->data;
        $type = $event->type;
        $path = 'logs/operation.log';
        Log::write($data, $type, $path);
    }
}
