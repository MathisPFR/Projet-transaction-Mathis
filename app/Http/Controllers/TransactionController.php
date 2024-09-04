<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Transactions",
 *     description="API Endpoints for managing transactions"
 * )
 */
class TransactionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/transactions",
     *     tags={"Transactions"},
     *     summary="Get list of all transactions",
     *     description="Retrieve all transactions for the authenticated user",
     *     operationId="getTransactions",
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of transactions",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Transaction")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function index()
    {
        $transactions = auth()->user()->transactions;  
        return response()->json($transactions, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/transactions",
     *     tags={"Transactions"},
     *     summary="Create a new transaction",
     *     description="Create a new transaction for the authenticated user",
     *     operationId="createTransaction",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"amount", "type", "date", "name"},
     *             @OA\Property(property="amount", type="number", format="float", example=100.50),
     *             @OA\Property(property="type", type="string", example="revenue"),
     *             @OA\Property(property="date", type="string", format="date", example="2024-09-01"),
     *             @OA\Property(property="name", type="string", example="Vente de produit")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Transaction created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Transaction")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string',
        ]);

        $transaction = auth()->user()->transactions()->create($validatedData);

        return response()->json($transaction, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Get a specific transaction",
     *     description="Retrieve a transaction by its ID for the authenticated user",
     *     operationId="getTransactionById",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the transaction",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Transaction retrieved",
     *         @OA\JsonContent(ref="#/components/schemas/Transaction")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function show($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        return response()->json($transaction, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Update a transaction",
     *     description="Update an existing transaction for the authenticated user",
     *     operationId="updateTransaction",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the transaction",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"amount", "type", "date", "name"},
     *             @OA\Property(property="amount", type="number", format="float", example=200.50),
     *             @OA\Property(property="type", type="string", example="expense"),
     *             @OA\Property(property="date", type="string", format="date", example="2024-09-01"),
     *             @OA\Property(property="name", type="string", example="Achat matériel")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Transaction updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Transaction")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string',
        ]);

        $transaction = auth()->user()->transactions()->findOrFail($id);
        $transaction->update($validatedData);

        return response()->json($transaction, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/transactions/{id}",
     *     tags={"Transactions"},
     *     summary="Delete a transaction",
     *     description="Delete a specific transaction by its ID",
     *     operationId="deleteTransaction",
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the transaction",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Transaction deleted successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaction not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function destroy($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted'], 200);
    }
}
