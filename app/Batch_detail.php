<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Batch_detail extends Model
{
    use LogsActivity;

    // protected static $ignoreChangedAttributes = ['password' , 'updated_id'];

    protected static $logAttributes = ['batch_name', 'creater_email' , 'enrollment' , 'is_deleted' , 'batch_limit' , 'status'];

    protected static $logName = 'Class';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} class";
    }
}
