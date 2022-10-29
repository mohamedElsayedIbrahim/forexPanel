<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Contact extends Model
{
    use Notifiable, LogsActivity;

    protected $fillable = [
        'fullName','mail','subject','message'
    ];

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['fullName','mail','subject','message'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission has been {$eventName}";
    }
}
