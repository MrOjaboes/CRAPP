<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalSlip extends Model
{
    protected $fillable = [
        'station_code',
        'station_address',
        'victim_name',
        'victim_address',
        'case_type',
        'gender',
        'nationality',
        'hospital_name',
        'hospital_address',
        'hospital_bill',
        'issued_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
