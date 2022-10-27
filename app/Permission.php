<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use Notifiable, LogsActivity;

    protected $fillable = [
        'nameScreen',
    ];

    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logAttributes = ['nameScreen'];
    protected static $logName = 'user';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission has been {$eventName}";
    }

    public function users()
    {
        return $this->BelongsToMany('App\User');
    }
}
