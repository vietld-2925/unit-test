<?php

namespace Tests\Unit;

use App\Models\BiaKeangnam;
use PHPUnit\Framework\TestCase;

class BiaKeangnamTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCalculatePrice()
    {
        $biaKeangnam = new BiaKeangnam();
        $this->assertEquals(490, $biaKeangnam->calculatePrice('12:00', false, false));
        $this->assertEquals(490, $biaKeangnam->calculatePrice('12:00', false, true));
        $this->assertEquals(490, $biaKeangnam->calculatePrice('12:00', true, false));
        $this->assertEquals(100, $biaKeangnam->calculatePrice('12:00', true, true));
        $this->assertEquals(290, $biaKeangnam->calculatePrice('16:00', false, false));
        $this->assertEquals(290, $biaKeangnam->calculatePrice('16:00', false, true));
        $this->assertEquals(290, $biaKeangnam->calculatePrice('16:00', true, false));
        $this->assertEquals(100, $biaKeangnam->calculatePrice('16:00', true, true));
    }
}
