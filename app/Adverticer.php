<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Adverticer extends Model
{
    use Notifiable, LogsActivity;

    protected $fillable = [
        'posation','poster'
    ];

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['posation','poster'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Adverticer has been {$eventName}";
    }
}
