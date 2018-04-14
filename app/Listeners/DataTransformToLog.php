<?php

namespace App\Listeners;

use App\Events\DataTransForm;
use Illuminate\Support\Facades\Log;

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
        Log::useDailyFiles(storage_path('logs/operation.log'));
        Log::notice($data);
        Log::getMonolog()->popHandler();
    }
}
