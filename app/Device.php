<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Device extends Model
{
    use Eloquence;

    protected $fillable = [
        'manufacturer',
        'type',
        'serial_number',
        'model',
        'notes',
    ];

    protected $searchableColumns = [
        'serial_number'
    ];


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
