<?php

namespace App\Repositories;

use App\Models\QuanAoHoanKiem;

class QuanAoHoanKiemRepository
{
    protected $quanAoHoanKiem;

    public function __construct(QuanAoHoanKiem $quanAoHoanKiem)
    {
        $this->quanAoHoanKiem = $quanAoHoanKiem;
    }
}
