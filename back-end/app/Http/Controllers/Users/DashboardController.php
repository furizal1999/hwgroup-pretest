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
        $data['dummyData'] = [
                            [
                                'id' => 1, 
                                'api_url' =>  url('api/getcategories'), 
                                'method' => 'GET',
                                'function' => 'Menampilkan/mendapatkan data kategori buku',
                            ],[
                                'id' => 2, 
                                'api_url' =>  url('api/addcategories'), 
                                'method' => 'POST',
                                'function' => 'Menambahkan/input data kategori buku',
                            ],[
                                'id' => 3, 
                                'api_url' => url('api/updatecategories/{category_id}'), 
                                'method' => 'PUT',
                                'function' => 'Mengupdate data kategori buku',
                            ],[
                                'id' => 4, 
                                'api_url' => url('api/deletecategories/{category_id}'), 
                                'method' => 'DELETE',
                                'function' => 'Menghapus data kategori buku',
                            ],[
                                'id' => 5, 
                                'api_url' =>  url('api/getbooks'), 
                                'method' => 'GET',
                                'function' => 'Menampilkan/mendapatkan data buku',
                            ],[
                                'id' => 6, 
                                'api_url' =>  url('api/addbooks'), 
                                'method' => 'POST',
                                'function' => 'Menambahkan/input data buku',
                            ],[
                                'id' => 7, 
                                'api_url' => url('api/updatebooks/{book_id}'), 
                                'method' => 'PUT',
                                'function' => 'Mengupdate data buku',
                            ],[
                                'id' => 8, 
                                'api_url' => url('api/deletebooks/{book_id}'), 
                                'method' => 'DELETE',
                                'function' => 'Menghapus data buku',
                            ],[
                                'id' => 9, 
                                'api_url' =>  url('api/getloans'), 
                                'method' => 'GET',
                                'function' => 'Menampilkan/mendapatkan data pinjaman buku',
                            ],[
                                'id' => 10, 
                                'api_url' =>  url('api/addloans'), 
                                'method' => 'POST',
                                'function' => 'Menambahkan/input data peminjaman buku',
                            ],[
                                'id' => 11, 
                                'api_url' => url('api/updateloans/{loan_id}'), 
                                'method' => 'PUT',
                                'function' => 'Mengupdate data untuk pengembalian buku',
                            ],
                        ];
        return view('dashboard', $data);
    }
}
