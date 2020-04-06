<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        if (!$transactions) {
          return response()->json([
              'status'=>'failed',
              'message' => 'No transactions found!'
          ], 500);
        }
        return response()->json([
            'status'=>'success',
            'transactions' => $transactions
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $inputs = $request->all();
        
        $transaction = new Transaction();
        $transaction->fill($inputs);
        $transaction->save();

        return response()->json([
            'status' => 'success',
            'transaction' => $transaction
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->first();

        return response()->json([
          'status' => 'success',
          'transaction' => $transaction
      ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        
        $transaction = Transaction::where('id', $id)->first();

        // $trade -> name = $inputs['name'];
        // $trade -> description = $inputs['description'];
        $transaction -> update($inputs);
        $transaction-> save();

        return response()->json([
            'status' => 'success',
            'transaction' => $transaction
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::where('id', $id)->delete();

        return response()->json([
            'status' => 'success'
        ], 201);
    }
}
