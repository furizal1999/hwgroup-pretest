@extends('part.app')

@section('content')
   <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
      
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar bg-light">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="#" class="header-logo">
                           <div class="pt-2 pl-2 logo-title">
                              <span class="text-primary text-uppercase">HW Group</span>
                           </div>
                        </a>
                     </div>
                  </div>
                 
                  <div class="collapse navbar-collapse">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon">
                           <a href="{{ route("users.logout") }}" class="iq-waves-effect text-danger rounded">
                              Keluar
                           </a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row content-body">
                  <div class="col-lg-6">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-bg-danger">
                        <div class="iq-card-body box iq-box-relative">
                           <h4 class="d-block mb-3 text-black">Welcome {{ Session::get('name') }}</h4>
                           <p class="d-inline-block welcome-text text-black">Selamat datang di sistem laravel berbasis API!</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <ul class="suggestions-lists m-0 p-0">
                              <h4>Buatlah sebuah aplikasi dengan laravel berbasis REST API untuk menyelesaikan masalah ini:</h4>
                             <ul>
                              <li>login / register (boleh ada boleh tidak)</li>
                              <li>pembuatan / penghapusan / perubahan kategori buku</li>
                              <li>pembuatan / penghapusan / perubahan buku</li>
                              <li>peminjaman buku</li>
                              <li>pengembalian buku</li>
                              <li>daftar buku yang dipinjam</li>
                             </ul>
                           </ul>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Daftar API</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless tbl-server-info">
                                 <thead>
                                    <tr>
                                       <th scope="col">No</th>
                                       <th scope="col">API</th>
                                       <th scope="col">Metode</th>
                                       <th scope="col">Kegunaan</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @php
                                       // Memasukkan data dummy ke dalam array
                                       // dd($dummyData);
                                    @endphp
                                    
                                    @foreach ($dummyData as $item)
                                    <tr>
                                       <td>{{ $item['id'] }}</td>
                                       <td><div class="text-primary">{{ $item['api_url'] }}</div></td>
                                       <td>{{ $item['method'] }}</td>
                                       <td>{{ $item['function'] }}</td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      @include('part.footer')
@endsection