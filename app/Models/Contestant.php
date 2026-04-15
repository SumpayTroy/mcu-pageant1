<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $fillable =
        [
            'number',
            'name',
            'course',
            'photo',
            'event_id',
        ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'contestant_event');
    }

}
