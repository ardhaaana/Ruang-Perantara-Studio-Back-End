<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\transfer_confirm;
use Illuminate\Http\Request;

use App\Helpers\ResponseFormatter;
use App\Models\TransferConfirm;

class Transfer_confirmController extends Controller
{

   public function TransferConfirm(Request $request,  $user_id)
    {
        
            $request->validate([
                'name' => ['required'],
                'number_rekening' => ['required'],
                'email' => ['required'],
                // 'photo_transfer' => ['required', 'max:255'],
               
            ]);

            TransferConfirm::create([
                'name' => $request->name,
                'number_rekening' => $request->number_rekening,
                'email' => $request->email,
                // 'photo_transfer' => $request->photo_transfer,
            ]);

        return ResponseFormatter::success($request,'Upload berhasil');
        
    }
}
