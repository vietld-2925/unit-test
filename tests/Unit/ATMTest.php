<?php

namespace Tests\Unit;

use App\Models\ATM;
use PHPUnit\Framework\TestCase;

class ATMTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCalculateFee()
    {
        $atm = new ATM();
        $this->assertEquals(110,$atm->calculateFee('2022-03-29 00:20:20', false,false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 09:00:00', false,false));
        $this->assertEquals(110,$atm->calculateFee('2022-03-29 18:00:00', false,false));

        /*Chu Nhat, Ngay le*/
        $this->assertEquals(110,$atm->calculateFee('2022-03-29 09:00:00', false,true));
        $this->assertEquals(110,$atm->calculateFee('2022-03-27 09:00:00', false,false));
        $this->assertEquals(110,$atm->calculateFee('2022-03-27 09:00:00', false,true));

        /*Khach vip*/
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 00:20:20', true, false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 18:00:00', true, false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 09:00:00', true, false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 00:20:20', true, true));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 18:00:00', true, true));
        $this->assertEquals(0,$atm->calculateFee('2022-03-29 09:00:00', true, true));


        $this->assertEquals(0,$atm->calculateFee('2022-03-27 00:20:20', true, false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-27 18:00:00', true, false));
        $this->assertEquals(0,$atm->calculateFee('2022-03-27 09:00:00', true, false));

        $this->assertEquals(0,$atm->calculateFee('2022-03-27 00:20:20', true, true));
        $this->assertEquals(0,$atm->calculateFee('2022-03-27 18:00:00', true, true));
        $this->assertEquals(0,$atm->calculateFee('2022-03-27 09:00:00', true, true));
    }
}
