<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretransactionRequest;
use App\Http\Requests\UpdatetransactionRequest;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = auth()->user()->transactions;  // Obtenir les transactions de l'utilisateur connecté
        return response()->json($transactions, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',  // 'expense' ou 'revenue'
            'date' => 'required|date',
            'name' => 'required|string',
        ]);

        $transaction = auth()->user()->transactions()->create($validatedData);

        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        return response()->json($transaction, 200);
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted'], 200);
    }
}
