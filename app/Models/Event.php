<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contestant;

class Event extends Model
{
    protected $fillable =
    [
        'eventName',
        'status',
    ];

    public function contestants()
    {
        return $this -> hasMany(Contestant::class);
    }
}
