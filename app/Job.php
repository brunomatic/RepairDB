<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'notes'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parts(){
        return $this->hasMany(Part::class);
    }

}
