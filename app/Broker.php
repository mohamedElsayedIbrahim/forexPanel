<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Broker extends Model
{
    use Notifiable, LogsActivity;
    
    protected $fillable = [
        'title','logo','content'
    ];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['title','logo'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Broker has been {$eventName}";
    }
}
