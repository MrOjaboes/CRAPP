<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliceInvitation extends Model
{
    
    protected $fillable = [
        'officer_name',
        'rank',
        'invitee_name',
        'gender',
        'reason',
        'invitation_date',
        'police_district',
        'station_code',
        'invitee_address',
        'response_date',        
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
