<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Http\Requests\TransactionRequest;
use App\Models\TransactionItem;
use Yajra\DataTables\Facades\DataTables;
use illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->getdate) {
        $getdate = Carbon::parse(request()->getdate)->toDateTimeString();
         $data = Transaction::with(['user'])->whereDate('created_at', $getdate)->get();
    } else {
        $getdate = Carbon::parse(request()->start_date)->toDateTimeString();
        $data = Transaction::with(['user'])->get();
    }
    
    return view('pages.dashboard.transaction.index', compact('data','getdate'));

        // $data = Transaction::with(['user'])->get();
        //   return view('pages.dashboard.transaction.index',[
        //     'data' => $data,
        // ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
     
    public function show(Transaction $transaction)
    {
        
            $transaction = Transaction::find($transaction->id);
            $data = TransactionItem::with(['product'])->where('transactions_id', $transaction->id)->get();

            return view('pages.dashboard.transaction.show', compact('transaction'),[
            'transaction' =>$transaction,
            'data' => $data,
            ]);
               
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit',[
            'item' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();

        $transaction->update($data);

        return redirect()->route('dashboard.transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
