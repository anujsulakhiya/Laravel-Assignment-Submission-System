<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Assignment extends Model
{
    use LogsActivity;

    // protected static $ignoreChangedAttributes = ['password' , 'updated_id'];

    protected static $logAttributes = ['email', 'batch_id' , 'assignment_name' , 'subject_name' , 'description' , 'last_submission_date' ,'is_deleted'];

    protected static $logName = 'Assignment';

    // protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} assignment";
    }
}
