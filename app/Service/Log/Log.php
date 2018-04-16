<?php


namespace App\Service\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as LogFacades;

class Log
{
    public static function write($data, $type, $path)
    {
        $content = [
            'type' => $type,
            'IP'   => request()->getClientIp(),
            'who'  => Auth::user(),
            'data' => $data,
        ];
        self::toLog($content, $path);
    }

    private static function toLog($content, $path)
    {
        LogFacades::useDailyFiles(storage_path($path));
        LogFacades::notice($content);
        LogFacades::getMonolog()->popHandler();
    }
}