<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliceRecord extends Model
{
     
    protected $fillable = [
        'suspect_name',
        'file_number',
        'police_formation',
        'date_of_arrest',
        'nature_of_offence',
        'admin_suspect',
        'remarks',              
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
