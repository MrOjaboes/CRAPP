<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtRecord extends Model
{
      
    protected $fillable = [
        'defendant_name',
        'charge_number',
        'offence_nature',
        'court_name',
        'court_charge',
        'arraignment_date',
        'final_charge',
        'gender',              
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
