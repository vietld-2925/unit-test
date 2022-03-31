<?php

namespace App\Repositories;

use App\Models\ATM;

class ATMRepository
{
    protected $atm;

    public function __construct(ATM $atm)
    {
        $this->atm = $atm;
    }
}
