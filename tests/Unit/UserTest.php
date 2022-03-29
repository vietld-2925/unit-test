<?php

namespace Tests\Unit;

use App\Models\TestSun;
use Illuminate\Database\DatabaseManager;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_ex1()
    {
        $testSun = new TestSun();
        $this->assertEquals(490,$testSun->ex1('12:00',false, false));
        $this->assertEquals(490,$testSun->ex1('12:00',false, true));
        $this->assertEquals(490,$testSun->ex1('12:00',true, false));
        $this->assertEquals(100,$testSun->ex1('12:00',true, true));
        $this->assertEquals(290,$testSun->ex1('16:00',false, false));
        $this->assertEquals(290,$testSun->ex1('16:00',false, true));
        $this->assertEquals(290,$testSun->ex1('16:00',true, false));
        $this->assertEquals(100,$testSun->ex1('16:00',true, true));
    }

    public function test_ex2()
    {
        $testSun = new TestSun();
        $this->assertEquals(110,$testSun->ex2('2022-03-29 00:20:20',false,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',false,false));
        $this->assertEquals(110,$testSun->ex2('2022-03-29 18:00:00',false,false));

        /*Chu Nhat, Ngay le*/
        $this->assertEquals(110,$testSun->ex2('2022-03-29 09:00:00',false,true));
        $this->assertEquals(110,$testSun->ex2('2022-03-27 09:00:00',false,false));
        $this->assertEquals(110,$testSun->ex2('2022-03-27 09:00:00',false,true));

        /*Khach vip*/
        $this->assertEquals(0,$testSun->ex2('2022-03-29 00:20:20',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 18:00:00',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',true,false));

        $this->assertEquals(0,$testSun->ex2('2022-03-29 00:20:20',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 18:00:00',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',true,true));


        $this->assertEquals(0,$testSun->ex2('2022-03-27 00:20:20',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 18:00:00',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 09:00:00',true,false));

        $this->assertEquals(0,$testSun->ex2('2022-03-27 00:20:20',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 18:00:00',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 09:00:00',true,true));
    }

    public function test_ex3()
    {
        $testSun = new TestSun();
        $this->assertEquals(110,$testSun->ex2('2022-03-29 00:20:20',false,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',false,false));
        $this->assertEquals(110,$testSun->ex2('2022-03-29 18:00:00',false,false));

        /*Chu Nhat, Ngay le*/
        $this->assertEquals(110,$testSun->ex2('2022-03-29 09:00:00',false,true));
        $this->assertEquals(110,$testSun->ex2('2022-03-27 09:00:00',false,false));
        $this->assertEquals(110,$testSun->ex2('2022-03-27 09:00:00',false,true));

        /*Khach vip*/
        $this->assertEquals(0,$testSun->ex2('2022-03-29 00:20:20',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 18:00:00',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',true,false));

        $this->assertEquals(0,$testSun->ex2('2022-03-29 00:20:20',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 18:00:00',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-29 09:00:00',true,true));


        $this->assertEquals(0,$testSun->ex2('2022-03-27 00:20:20',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 18:00:00',true,false));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 09:00:00',true,false));

        $this->assertEquals(0,$testSun->ex2('2022-03-27 00:20:20',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 18:00:00',true,true));
        $this->assertEquals(0,$testSun->ex2('2022-03-27 09:00:00',true,true));
    }

    public function test_ex4()
    {
        $testSun = new TestSun();
        $this->assertEquals(7,$testSun->ex3(['So Mi','Quan','Quan','Quan','Quan','Quan','Quan','Quan','Quan']));
        $this->assertEquals(0,$testSun->ex3(['So Mi','Quan','Quan','Quan','Quan']));
        $this->assertEquals(5,$testSun->ex3(['So Mi','Ca Vat','Quan']));
        $this->assertEquals(12,$testSun->ex3(['So Mi','Ca Vat','Quan','Quan','Quan','Quan','Quan','Quan','Quan']));
    }
}
