<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'name',
        'age', 'blood_type'
        ,'birth_type','number',
        'dad_job','mum_job',
        'phone','address','notes','doctor_id'
    ];

    public function user(){
        return  $this->belongsTo('App\User','doctor_id');
    }
    
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

    public function birthType(){
        if($this->birth_type == '0'){
            return 'Natural childbirth';
        }
        else if($this->birth_type == '1'){
            return 'Caesarean delivery';
        }
    }
    public function bloodType(){

    if($this->blood_type == '0'){
        return 'O+';
    }
    else if($this->blood_type == '1'){
        return 'O-';
    }
    else if($this->blood_type == '2'){
        return 'A+';
    }
    else if($this->blood_type == '3'){
        return 'A-';
    }
    else if($this->blood_type == '4'){
        return 'B+';
    }
    else if($this->blood_type == '5'){
        return 'B-';
    }
    else if($this->blood_type == '6'){
        return 'AB+';
    }
    else if($this->blood_type == '7'){
        return 'AB-';
    }
    
}
}
