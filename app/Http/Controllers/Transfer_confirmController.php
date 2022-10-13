<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transfer_confirmRequest;
use App\Models\Transaction;
use App\Models\Transfer_confirm;
use App\Models\TransferConfirm;
use App\Models\TransferConfrim;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class Transfer_confirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = TransferConfirm::get();
            return view('pages.dashboard.transfer_confirm.index',[
            'data' =>$data
        ]);
    }


   
}
