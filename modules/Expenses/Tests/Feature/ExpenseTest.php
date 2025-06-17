<?php

namespace Modules\Expenses\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Illuminate\Http\Response;

class ExpenseTest extends TestCase
{
    public function test_user_can_create_expense() 
    {
        $data = [
            'title' => 'Lunch',
            'amount' => 25.50,
            'category' => 'food',
            'expense_date' => now()->format('Y-m-d'),
            'notes' => 'Business lunch',
        ];

        $response = $this->postJson('/api/expenses', $data);
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('expenses', ['title' => 'Lunch']);
    }
}