<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use Notifiable, LogsActivity;

    protected $fillable = ['type', 'content'];

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['type', 'content'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission has been {$eventName}";
    }
}
