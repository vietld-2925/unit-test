<?php

namespace Tests\Unit\Services;

use App\Repositories\ATMRepository;
use App\Services\ATMService;
use PHPUnit\Framework\TestCase;

class ATMServiceTest extends TestCase
{
    protected $atmService;

    protected $atmRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->atmRepository = \Mockery::mock(ATMRepository::class);

        $this->atmService = new ATMService(
            $this->atmRepository
        );
    }

    public function test_calculate_fee_in_normal_time_and_normal_day_without_vip()
    {
        $this->assertEquals(110, $this->atmService->calculateFee('2022-03-29 00:20:20',false,false));
    }

    public function test_calculate_fee_in_promotion_time_and_normal_day_without_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-29 09:00:00',false,false));
    }

    public function test_calculate_fee_in_promotion_time_and_holiday_day_without_vip()
    {
        $this->assertEquals(110, $this->atmService->calculateFee('2022-03-29 09:00:00',false,true));
    }

    public function test_calculate_fee_in_promotion_time_and_weekend_day_without_vip()
    {
        $this->assertEquals(110, $this->atmService->calculateFee('2022-03-27 09:00:00',false,false));
    }

    public function test_calculate_fee_in_promotion_time_and_weekend_day_and_holiday_without_vip()
    {
        $this->assertEquals(110, $this->atmService->calculateFee('2022-03-27 09:00:00',false,true));
    }

    public function test_calculate_fee_in_normal_time_and_normal_day_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-29 00:20:20',true,false));
    }

    public function test_calculate_fee_in_promotion_time_and_normal_day_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-29 09:00:00',true,false));
    }

    public function test_calculate_fee_in_normal_time_and_holiday_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-29 00:20:20',true,true));
    }

    public function test_calculate_fee_in_promotion_time_and_holiday_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-29 09:00:00',true,true));
    }

    public function test_calculate_fee_in_normal_time_and_weekend_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-27 00:20:20',true,false));
    }

    public function test_calculate_fee_in_promotion_time_and_weekend_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-27 09:00:00',true,false));
    }

    public function test_calculate_fee_in_normal_time_and_weekend_and_holiday_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-27 00:20:20',true,true));
    }

    public function test_calculate_fee_in_promotion_time_and_weekend_and_holiday_with_vip()
    {
        $this->assertEquals(0, $this->atmService->calculateFee('2022-03-27 09:00:00',true,true));
    }
}
