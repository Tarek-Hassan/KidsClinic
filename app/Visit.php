<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //
    protected $fillable = [
        'temp','weight', 'length','head_circ','patient_id','notes','doctor_id'
    ];

    public function user(){
        return  $this->belongsTo('App\User','doctor_id');
    }

    public function patient(){
        return  $this->belongsTo('App\Patient','patient_id');
    }
}
