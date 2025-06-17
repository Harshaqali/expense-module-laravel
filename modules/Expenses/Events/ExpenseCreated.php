<?php 

namespace Modules\Expenses\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;
use Modules\Expenses\Models\Expense;
use Illuminate\Broadcasting\PrivateChannel;

class ExpenseCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Expense $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        return new PrivateChannel('expenses');
    }
}
