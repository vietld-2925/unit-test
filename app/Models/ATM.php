<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ATM extends Model
{
    use HasFactory;

    public function calculateFee($datetime='2021-10-20 14:20:20',$isVip=false,$isHoliday=false){
        $time = date('H:i',strtotime($datetime));
        $date_input = getDate(strtotime($datetime));

        $fee = 110;
        if(
            $time>='08:45' && $time<='17:59'
            && !in_array($date_input['weekday'],['Saturday','Sunday'])
            && !$isHoliday
        ){
            $fee = 0;
        }
        if($isVip){
            $fee = 0;
        }

        return $fee;
    }

}
