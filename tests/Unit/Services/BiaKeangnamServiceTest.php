<?php

namespace Tests\Unit\Services;

use App\Repositories\BiaKeangnamRepository;
use App\Services\BiaKeangnamService;
use PHPUnit\Framework\TestCase;

class BiaKeangnamServiceTest extends TestCase
{
    protected $biaKeangnamService;

    protected $biaKeangnamRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->biaKeangnamRepository = \Mockery::mock(BiaKeangnamRepository::class);

        $this->biaKeangnamService = new BiaKeangnamService(
            $this->biaKeangnamRepository
        );
    }

    public function test_calculate_price_in_normal_time_without_voucher_and_not_first_time()
    {
        $this->assertEquals(490, $this->biaKeangnamService->calculatePrice('12:00', false, false));
    }

    public function test_calculate_price_in_normal_time_without_voucher_and_first_time()
    {
        $this->assertEquals(490, $this->biaKeangnamService->calculatePrice('12:00', false, true));
    }

    public function test_calculate_price_in_normal_time_with_voucher_and_not_first_time()
    {
        $this->assertEquals(490, $this->biaKeangnamService->calculatePrice('12:00', true, false));
    }

    public function test_calculate_price_in_normal_time_with_voucher_and_first_time()
    {
        $this->assertEquals(100, $this->biaKeangnamService->calculatePrice('12:00', true, true));
    }

    public function test_calculate_price_in_promotion_time_without_voucher_and_not_first_time()
    {
        $this->assertEquals(290, $this->biaKeangnamService->calculatePrice('16:00', false, false));
    }

    public function test_calculate_price_in_promotion_time_without_voucher_and_first_time()
    {
        $this->assertEquals(290, $this->biaKeangnamService->calculatePrice('16:00', false, true));
    }

    public function test_calculate_price_in_promotion_time_with_voucher_and_not_first_time()
    {
        $this->assertEquals(290, $this->biaKeangnamService->calculatePrice('16:00', true, false));
    }

    public function test_calculate_price_in_promotion_time_with_voucher_and_first_time()
    {
        $this->assertEquals(100, $this->biaKeangnamService->calculatePrice('16:00', true, true));
    }

    public function test_calculate_price_invalid_time()
    {
        $this->assertEquals(490, $this->biaKeangnamService->calculatePrice('11', true, true));
    }
}
