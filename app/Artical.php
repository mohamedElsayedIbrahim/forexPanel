<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Artical extends Model
{
    use Notifiable, LogsActivity;

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['title','conent','keywords','description','poster'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission has been {$eventName}";
    }
}
