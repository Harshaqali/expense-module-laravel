<?php

namespace Modules\Expenses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Expense extends Model
{
    use HasUuids;

    protected $table = 'expenses';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $casts = [
        'expense_date' => 'date',
    ];

    protected $fillable = [
        'title', 'amount', 'category', 'expense_date', 'notes'
    ];

    public function getRouteKeyName(): string
    {
        return 'id'; // This is your UUID primary key
    }
}
