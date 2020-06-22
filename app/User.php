<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','avatar', 'email', 'password','role','mobile','national_id','patient_id','bio'
    ];

    public function isAdmin(){
        return $this->role;
    }
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
    // each Doctor hasmany patient
    public function patients()
    {
        return $this->hasMany('App\Patient','doctor_id');
    }
    
    // each User hasone  patient(email to one patient)
    public function patient(){
        return  $this->belongsTo('App\Patient','patient_id');
    }
    // each doctor  hasmany Article
    public function articles()
    {
        return $this->hasMany('App\Article','doctor_id');
    }



}
