<?php

namespace App\Repositories;

use App\Models\BiaKeangnam;

class BiaKeangnamRepository
{
    protected $biaKeangnam;

    public function __construct(BiaKeangnam $biaKeangnam)
    {
        $this->biaKeangnam = $biaKeangnam;
    }
}
