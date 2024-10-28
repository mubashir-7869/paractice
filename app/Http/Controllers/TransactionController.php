<?php
namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();

        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        // dd($transaction);
        // $transaction = Transaction::where('id', $transaction)->first();
        return view('transactions.show', compact('transaction'));
    }

    public function export(Transaction $transaction, $id)
    {
        return view('transactions.export', compact('transaction'));
    }

    public function duplicate(Transaction $transaction, $uuid)
    {
        $transaction = Transaction::where('uuid', $uuid)->with('user')->first();
        // dd($uuid);
        return view('transactions.duplicate', compact('transaction'));
    }
}
