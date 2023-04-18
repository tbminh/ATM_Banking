<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_page.index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/page-login');
    }
}
