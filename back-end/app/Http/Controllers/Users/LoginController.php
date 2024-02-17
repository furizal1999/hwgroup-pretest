<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Session;

class LoginController extends Controller
{
    function __construct(){
        $this->login = new Login;
    }
    function index(){
        return view('welcome');
    }
    public function register(Request $request)
    {
        if(isset($request->_token) && isset($request->register)){
            $request->validate([
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'password_conf' => 'required|same:password'
            ],[
                'name' => 'Nama harus diisi serta hanya boleh terdiri dari huruf dan spasi',
                'email' => 'Format email tidak valid.',
                'password' => 'Password minimal harus 8 karakter yang terdiri dari kombinasi huruf kecil, huruf kapital, angka, dan karakter.',
                'password_conf' => 'Konfirmasi password harus sama dengan password.',
            ]);
            $enc_pass = password_hash($request->password, PASSWORD_DEFAULT);

            if($this->login->checkPrimaryKey($request->email)<1){
                if($this->login->register( $request->email, $request->name, $enc_pass)){
                    return redirect(route("/"))->with(['alertclass' => "success", 'message' => "pendaftaran akun berhasil, silahkan login dengan email dan password yang telah didaftarkan!."]);
                }else{
                    return redirect(route("/"))->with(['alertclass' => "danger", 'message' => "Maaf, gagal mendaftarkan akun."]);
                }
            }else{
                return redirect(route("/"))->with(['alertclass' => "danger", 'message' => "Maaf, akun sudah terdaftar sebelumnya."]);
            }
        }else{
            return redirect(route("/"))->with(['alertclass' => "warning", 'message' => "Upss. Ada kesalahan."]);
        }
    }

    public function login(Request $request){
        if(isset($request->_token) && isset($request->login)){
            if($data = $this->login->getLogin($request->email)){
                if(password_verify($request->password, $data->password)){
                    Session::put('login_hwgroup', true);
                    Session::put('name', $data->name);
                    Session::put('email', $data->email);
                    return redirect(route("users.dashboard"));
                }else{
                    return redirect(route("/"))->with(['alertclass' => "danger", 'message' => "Maaf, password yang anda salah."]);
                }
            }else{
                return redirect(route("/"))->with(['alertclass' => "danger", 'message' => "Maaf, email yang anda salah."]);
            }
        }else{
            return redirect(route("/"))->with(['alertclass' => "warning", 'message' => "Upss. Ada kesalahan."]);
        }
    }

    function logout(){
        Session::flush();
        return redirect(route('/'));
    }
}
