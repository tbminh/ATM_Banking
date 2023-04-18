<?php

namespace App\Http\Controllers;


use App\Atm;
use App\Bank;
use App\Transaction;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class TruAtmController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        $atms = Atm::all();
        return view('admin_page.truatm.index',['atms'=>$atms,'banks'=>$banks]);
    }

    public function update(Request $request)
    {
        $atm = new Atm();
        $atm->atm_name = $request->input('atm_name');
        $atm->atm_address = $request->input('atm_address');
        $atm->place_id = $request->input('place_id');
        $atm->bank_id = $request->input('bank_id');
        $atm->latitude = $request->input('latitude');
        $atm->longtitude = $request->input('longtitude');
        $atm->save();

        return redirect()->back()->with('message','Thêm trụ atm thành công');
    }

    public function delete($id)
    {
       Atm::destroy($id);
        return redirect()->back()->with('message','Xóa trụ atm thành công');
    }
}
