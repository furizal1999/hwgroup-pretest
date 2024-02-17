<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Closure;
use Session;

class CheckUserAccess
{
    public function handle($request, Closure $next)
    {
        // jika belum ada sesi/belum login
        if(((null == Session::get('login_hwgroup')) && (null == Session::get('email')))){
            // kembalikan ke halaman login 
            return redirect(route("/"));
		}
        // Lanjutkan ke proses berikutnya
        return $next($request);
    }
}