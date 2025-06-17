<?php

namespace Modules\Expenses\Http\Services;

use Modules\Expenses\Models\Expense;
use Modules\Expenses\Events\ExpenseCreated;

class ExpenseService
{
    public function list(array $filters = [])
    {
        $query = Expense::query();

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['from']) && isset($filters['to'])) {
            $query->whereBetween('expense_date', [$filters['from'], $filters['to']]);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        $expense = Expense::create($data);
        event(new ExpenseCreated($expense));
        return $expense;
    }

    public function update(string $id, array $data)
    {
        $expense = Expense::findOrFail($id); // Manually fetch using UUID
        $expense->update($data);
        return $expense;
    }

    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
    }
}
