<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSun extends Model
{
    use HasFactory;

    public function ex1($time='18:10', $hasVoucher=false, $isFirst=false){
        $data = [
            'price' => 490,
            'voucher' => 100,
            'promotion' => [
                'start' => '16:00',
                'end' => '17:59',
                'price' => 290
            ],
        ];
        $result = $data['price'];
        if($time <= $data['promotion']['end'] && $time >= $data['promotion']['start']){
            $result = $data['promotion']['price'];
        }

        if($hasVoucher && $isFirst){
            $result = $data['voucher'];
        }
        return $result;
    }

    public function ex2($datetime='2021-10-20 14:20:20',$isVip=false,$isHoliday=false){
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

    public function ex3($listProduct){
        $discount = 0;
        if(!is_array($listProduct)) return $discount;

        if(count($listProduct)>=7){
            $discount += 7;
        }

        if(
           in_array('So Mi',$listProduct)
           && in_array('Ca Vat',$listProduct)
        ){
            $discount += 5;
        }

        return $discount;
    }
}
