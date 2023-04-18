<?php

namespace App\Http\Controllers;


use App\Atm;
use App\AtmCard;
use App\Bank;
use App\Transaction;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class TheAtmController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        $cards = AtmCard::all();
        return view('admin_page.theatm.index',['cards'=>$cards,'banks'=>$banks]);
    }

    public function update(Request $request)
    {
        $theatm = new AtmCard();
        $theatm->card_name = $request->input('card_name');
        $theatm->bank_id = $request->input('bank_id');
        $theatm->save();

        return redirect()->back()->with('message','Thêm thẻ atm thành công');
    }

    public function delete($id)
    {
        AtmCard::destroy($id);
        return redirect()->back()->with('message','Xóa thẻ atm thành công');
    }
}
