<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class slider extends Model
{
    use Notifiable, LogsActivity;
    
    protected $fillable = [
        'image','content','link','btn_value'
    ];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['image','content','link'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "slide has been {$eventName}";
    }
}
