<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Transaction;
use App\User;

class HomeConTroller extends Controller
{
    public function index()
    {
        return view('custom_page.index');
    }

    public function post_login(Request $request)
    {
        $mail = $request->input('email');
        $pass = $request->input('pass');
        if (Auth::attempt(['email' => $mail, 'password' => $pass])) {
            return redirect('/');
        } else {
            return redirect()->back()->with('alert', 'Lỗi đăng nhập');
        }
    }
    public function log_out()
    {
        Auth::logout();
        return redirect('page-login');
    }
}
