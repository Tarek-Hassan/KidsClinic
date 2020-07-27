<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable=['name','phone','time','dept','checked','notes','user_id'];
    
    public function user(){
         return $this->belongsTo('\App\User');
     }
     public function dept(){
        if($this->dept == 0){
        return 'General Health';
        }
        else if($this->dept == 1){
            return 'Cardiology';
        }
        else if($this->dept == 2){
            return 'Dental';
        }
        else if($this->dept == 3){

            return 'Medical Research';
        }

     }
     
}
