<?php

namespace Tests\Unit;

use App\Models\QuanAoHoanKiem;
use PHPUnit\Framework\TestCase;

class QuanAoHoanKiemTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCalculateDiscount()
    {
        $quanAoHoanKiem = new QuanAoHoanKiem();
        $this->assertEquals(7, $quanAoHoanKiem->calculateDiscount(['So Mi', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan']));
        $this->assertEquals(0, $quanAoHoanKiem->calculateDiscount(['So Mi', 'Quan', 'Quan', 'Quan', 'Quan']));
        $this->assertEquals(5, $quanAoHoanKiem->calculateDiscount(['So Mi', 'Ca Vat', 'Quan']));
        $this->assertEquals(12, $quanAoHoanKiem->calculateDiscount(['So Mi', 'Ca Vat', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan']));
    }
}
