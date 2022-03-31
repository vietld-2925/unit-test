<?php

namespace Tests\Unit\Services;

use App\Repositories\QuanAoHoanKiemRepository;
use App\Services\QuanAoHoanKiemService;
use PHPUnit\Framework\TestCase;

class QuanAoHoanKiemServiceTest extends TestCase
{
    protected $quanAoHoanKiemService;

    protected $quanAoHoanKiemRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->quanAoHoanKiemRepository = \Mockery::mock(QuanAoHoanKiemRepository::class);

        $this->quanAoHoanKiemService = new QuanAoHoanKiemService(
            $this->quanAoHoanKiemRepository
        );
    }

    public function test_calculate_discount_when_buy_greater_and_equal_7_without_2_special_product()
    {
        $this->assertEquals(7, $this->quanAoHoanKiemService->calculateDiscount(['So Mi', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan']));
    }

    public function test_calculate_discount_when_buy_less_than_7_without_2_special_product()
    {
        $this->assertEquals(0, $this->quanAoHoanKiemService->calculateDiscount(['So Mi', 'Quan', 'Quan', 'Quan', 'Quan']));
    }

    public function test_calculate_discount_when_buy_less_than_7_with_2_special_product()
    {
        $this->assertEquals(5, $this->quanAoHoanKiemService->calculateDiscount(['So Mi', 'Ca Vat', 'Quan']));
    }

    public function test_calculate_discount_when_buy_buy_greater_and_equal_7_with_2_special_product()
    {
        $this->assertEquals(12, $this->quanAoHoanKiemService->calculateDiscount(['So Mi', 'Ca Vat', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan', 'Quan']));
    }
}
