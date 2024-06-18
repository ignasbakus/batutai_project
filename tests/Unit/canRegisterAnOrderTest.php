<?php

namespace Tests\Unit;

use App\Trampolines\TrampolineOrder;
use App\Trampolines\TrampolineOrderData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;


class canRegisterAnOrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Set up initial data for testing
        DB::table('orders_trampolines')->insert([
            ['trampolines_id' => 1, 'rental_start' => '2024-06-18', 'rental_end' => '2024-06-19'],
            ['trampolines_id' => 1, 'rental_start' => '2024-06-19', 'rental_end' => '2024-06-20']
        ]);
    }

    public function testIdenticalDates()
    {
        $this->assertFalse((new TrampolineOrder())->canRegisterOrder(new TrampolineOrderData(null, ['trampolines' => [['id' => 1, 'rental_start' => '2024-06-18', 'rental_end' => '2024-06-19']]]))['status']);
    }

    public function testDatesNextToEachOther()
    {
        $this->assertTrue((new TrampolineOrder())->canRegisterOrder(new TrampolineOrderData(null, ['trampolines' => [['id' => 1, 'rental_start' => '2024-06-20', 'rental_end' => '2024-06-21']]]))['status']);
    }

    public function testOverlappingPeriods()
    {
        $this->assertFalse((new TrampolineOrder())->canRegisterOrder(new TrampolineOrderData(null, ['trampolines' => [['id' => 1, 'rental_start' => '2024-06-17', 'rental_end' => '2024-06-19']]]))['status']);
    }

    public function testEventOverlappingFromBothSides()
    {
        $this->assertFalse((new TrampolineOrder())->canRegisterOrder(new TrampolineOrderData(null, ['trampolines' => [['id' => 1, 'rental_start' => '2024-06-17', 'rental_end' => '2024-06-21']]]))['status']);
    }
}
