<?php

namespace App\Services;

use App\Repositories\ATMRepository;

class ATMService
{
    protected $atmRepository;
    public function __construct(ATMRepository $atmRepository)
    {
        $this->atmRepository = $atmRepository;
    }

    public function calculateFee($datetime = '2021-10-20 14:20:20', $isVip = false, $isHoliday = false)
    {
        $fee = 110;

        if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{4})\s([0-9]{2}):([0-9]{2}):([0-9]{2})\s(.*)$/", $datetime)) {
            $time = date('H:i', strtotime($datetime));
            $dateInput = getDate(strtotime($datetime));

            if ($time >= '08:45' && $time <= '17:59'
                && !in_array($dateInput['weekday'], ['Saturday', 'Sunday'])
                && !$isHoliday
            ) {
                $fee = 0;
            }
            if ($isVip) {
                $fee = 0;
            }
        }

        return $fee;
    }
}
