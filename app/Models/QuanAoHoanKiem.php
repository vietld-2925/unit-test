<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanAoHoanKiem extends Model
{
    use HasFactory;

    public function calculateDiscount($listProduct){
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
