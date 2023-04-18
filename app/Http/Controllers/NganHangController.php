<?php

namespace App\Http\Controllers;


use App\Bank;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class NganHangController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('admin_page.nganhang.index',['banks'=>$banks]);
    }

    public function update(Request $request)
    {
        $nganhang = new Bank();
        $nganhang->bank_name = $request->input('bank_name');
        $nganhang->bank_address = $request->input('bank_address');
        $nganhang->place_id = $request->input('place_id');
        $nganhang->bank_number = $request->input('bank_number');
        $nganhang->latitude = $request->input('latitude');
        $nganhang->longtitude = $request->input('longtitude');
        $nganhang->save();

        return redirect()->back()->with('message','Thêm ngân hàng thành công');
    }

    public function delete($id)
    {
       Bank::destroy($id);
        return redirect()->back()->with('message','Xóa ngân hàng thành công');
    }
}
