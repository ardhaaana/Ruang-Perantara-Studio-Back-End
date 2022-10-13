<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        return view('dashboard', [
            'itung' => User::get(),
            'itung1' => Transaction::where('status', 'PENDING')->get(),
            'itung2' => Transaction::where('status', 'SUKSES')->get(),
            'itung3' => Transaction::where('status', 'BATAL')->get(),
            'itung4' => Transaction::where('status', 'DIKIRIM')->get(),
            'itung5' => Transaction::where('status','SUKSES')->sum('total_price'),
            
            'itung6' => Transaction::whereDate('created_at', Carbon::now())->get(),
            'produk' => Product::get()
          
            ]);
    }
}
