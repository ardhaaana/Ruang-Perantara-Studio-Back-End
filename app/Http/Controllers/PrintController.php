<?php
 
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PrintController extends Controller
{
  public function printAllReport(Transaction $transaction)
    {
        $data = Transaction::with(['items','items.product'])->get();
        $items = TransactionItem::with(['product'])->where('transactions_id')->get();
        
        return view('pages.dashboard.transaction.pdf', compact('data'),[
            'data' => $data,
            'item' => $items,
            'title' => 'Laporan_pdf'
        ]);

    }

    public function printIndividu($id)
    {
        $transaction = Transaction::find($id);
        $items = TransactionItem::with(['product'])->where('transactions_id', $id)->get();

        return view('pages.dashboard.transaction.invoice', [
            'transaction' => $transaction,
            'item' => $items,
            'title' => 'Laporan_individu'
        ]);
    }

}