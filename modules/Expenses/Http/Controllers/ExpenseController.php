<?php

namespace Modules\Expenses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Expenses\Http\Services\ExpenseService;
use Illuminate\Http\Request;
use Modules\Expenses\Http\Requests\CreateExpenseRequest;
use Modules\Expenses\Resources\ExpenseResource;
use Modules\Expenses\Models\Expense;
use Illuminate\Http\Response;

class ExpenseController extends Controller {
    public function __construct(protected ExpenseService $service) {}

    public function index(Request $request): JsonResponse
    {
        $expenses = $this->service->list($request->only(['category', 'from', 'to']));
        return response()->json(ExpenseResource::collection($expenses));
    }

    public function store(CreateExpenseRequest $request): JsonResponse
    {
        $expense = $this->service->create($request->validated());
        return response()->json(new ExpenseResource($expense), Response::HTTP_CREATED);
    }

    public function update(CreateExpenseRequest $request, string $id): JsonResponse
    {
        $expense = $this->service->update($id, $request->validated());
        return response()->json(new ExpenseResource($expense));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->service->destroy($id);
       return response()->json(['message' => 'Deleted'], 200);
    }
}