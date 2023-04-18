<?php

namespace App\Http\Controllers;


use App\Bank;
use App\Transaction;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class PhongGiaoDichController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        $trans = Transaction::all();
        return view('admin_page.phonggiaodich.index',['trans'=>$trans,'banks'=>$banks]);
    }

    public function update(Request $request)
    {
        $phonggd = new Transaction();
        $phonggd->trans_name = $request->input('trans_name');
        $phonggd->trans_address = $request->input('trans_address');
        $phonggd->place_id = $request->input('place_id');
        $phonggd->trans_phone = $request->input('trans_number');
        $phonggd->bank_id = $request->input('bank_id');
        $phonggd->latitude = $request->input('latitude');
        $phonggd->longtitude = $request->input('longtitude');
        $phonggd->save();

        return redirect()->back()->with('message','Thêm phòng giao dịch thành công');
    }

    public function delete($id)
    {
       Transaction::destroy($id);
        return redirect()->back()->with('message','Xóa phòng giao dịch thành công');
    }
}
