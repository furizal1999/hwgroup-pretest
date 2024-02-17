<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Session;

class DashboardController extends Controller
{
    function __construct(){
        $this->login = new Login;
    }
    function index(){
        return view('dashboard');
    }
}
