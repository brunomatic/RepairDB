<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Part extends Model
{
    use Eloquence;

    protected $fillable = [
        'manufacturer',
        'type',
        'serial_number',
        'description',
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }

}
