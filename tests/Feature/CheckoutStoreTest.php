<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_can_store_a_valid_order(): void
    {
        $response = $this->post('/checkout/store', [
            'order_type' => 'Take Out',
            'table_number' => 'A1',
            'items' => [
                [
                    'name' => 'Halo-Halo',
                    'quantity' => 1,
                    'price' => 90,
                    'prep_time_seconds' => 180,
                ],
            ],
            'subtotal' => 90,
            'discount' => 0,
            'total' => 90,
            'cash' => 100,
            'change' => 10,
        ]);

        $response->assertOk();
        $response->assertJsonPath('success', true);
        $this->assertDatabaseHas('orders', [
            'order_type' => 'Take Out',
            'subtotal' => 90.00,
            'total' => 90.00,
        ]);
    }
}
