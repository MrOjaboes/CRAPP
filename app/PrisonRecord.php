<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrisonRecord extends Model
{
     
    protected $fillable = [
        'accused_name',
        'charge_number',
        'arraignment_date',
        'offence_nature',
        'court_name',
        'prison_charge',
        'conviction_period',                     
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
