<?php

namespace App\Services;

use App\Repositories\QuanAoHoanKiemRepository;

class QuanAoHoanKiemService
{
    protected $quanAoHoanKiemRepository;
    public function __construct(QuanAoHoanKiemRepository $quanAoHoanKiemRepository)
    {
        $this->quanAoHoanKiemRepository = $quanAoHoanKiemRepository;
    }

    public function calculateDiscount($listProduct)
    {
        $discount = 0;
        if (!is_array($listProduct)) return $discount;

        if (count($listProduct) >= 7) {
            $discount += 7;
        }

        if (in_array('So Mi', $listProduct)
            && in_array('Ca Vat', $listProduct)
        ) {
            $discount += 5;
        }

        return $discount;
    }
}
