<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'username', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function medicalSlips()
    {
        return $this->hasMany(MedicalSlip::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function policeInvitations()
    {
        return $this->hasMany(PoliceInvitation::class);
    }
    public function policeRecords()
    {
        return $this->hasMany(PoliceRecord::class);
    }

    public function courtRecords()
    {
        return $this->hasMany(CourtRecord::class);
    }

    public function prisonRecords()
    {
        return $this->hasMany(PrisonRecord::class);
    }
     
}
