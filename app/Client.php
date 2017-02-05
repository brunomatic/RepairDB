<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Client extends Model
{

    use Eloquence;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'contact_person',
        'email',
        'telephone',
        'website',
        'notes',
    ];

    protected $searchableColumns = [
        'name',
    ];


    public function devices()
    {
        return $this->hasMany(Device::class);
    }


}
