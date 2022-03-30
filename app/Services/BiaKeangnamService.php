<?php

namespace App\Services;

use App\Repositories\BiaKeangnamRepository;

class BiaKeangnamService
{
    protected $biaKeangnamRepository;
    public function __construct(BiaKeangnamRepository $biaKeangnamRepository)
    {
        $this->biaKeangnamRepository = $biaKeangnamRepository;
    }

    public function calculatePrice($time = '18:10', $hasVoucher = false, $isFirst = false)
    {
        $data = [
            'price' => 490,
            'voucher' => 100,
            'promotion' => [
                'start' => '16:00',
                'end' => '17:59',
                'price' => 290,
            ],
        ];
        $result = $data['price'];
        if ($time <= $data['promotion']['end'] && $time >= $data['promotion']['start']) {
            $result = $data['promotion']['price'];
        }

        if ($hasVoucher && $isFirst) {
            $result = $data['voucher'];
        }
        return $result;
    }
}
