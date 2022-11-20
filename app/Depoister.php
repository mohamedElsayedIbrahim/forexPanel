<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Depoister extends Model
{
    use Notifiable, LogsActivity;

    protected $fillable = [
        'fullName','account','phone','amount','type'
    ];

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['fullName','account','phone','amount','type'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Depoister has been {$eventName}";
    }
}
