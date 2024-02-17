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
                 
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon">
                           <a href="#" class="search-toggle iq-waves-effect text-danger rounded">
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
                  <div class="col-lg-8">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-bg-danger">
                        <div class="iq-card-body box iq-box-relative">
                           <h4 class="d-block mb-3 text-black">Welcome {{ Session::get('name') }}</h4>
                           <p class="d-inline-block welcome-text text-black">Selamat datang di sistem laravel berbasis API!</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <ul class="suggestions-lists m-0 p-0">
                              <li class="d-flex mb-4 align-items-center justify-content-between">
                                 <div class="col-sm-9 p-0">
                                    <div class="d-flex align-items-center">
                                       <div class="avatar-55 text-center rounded iq-bg-danger">
                                          <span>B5</span>
                                       </div>
                                       <div class="media-support-info ml-3">
                                          <h5>Loads</h5>
                                          <p class="mb-0">Online Participant</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 p-0">
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar">
                                          <span class="bg-danger" data-percent="50"></span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="d-flex align-items-center justify-content-between">
                                 <div class="col-sm-9 p-0">
                                    <div class="d-flex align-items-center">
                                       <div class="avatar-55 text-center rounded iq-bg-primary">
                                          <span>G2</span>
                                       </div>
                                       <div class="media-support-info ml-3">
                                          <h5>Requests</h5>
                                          <p class="mb-0">Offline Participant</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 p-0">
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar">
                                          <span class="bg-primary" data-percent="80"></span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Active Instances</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless tbl-server-info">
                                 <thead>
                                    <tr>
                                       <th scope="col">Servers</th>
                                       <th scope="col"></th>
                                       <th scope="col">IP Address</th>
                                       <th scope="col">Created</th>
                                       <th scope="col">Tag</th>
                                       <th scope="col">Provider</th>
                                       <th scope="col"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div class="avatar-40 text-center rounded-circle iq-bg-danger position-relative">
                                             <span class="font-size-20 align-item-center"><i class="fa fa-user" aria-hidden="true"></i><span class="bg-success dots"></span></span>
                                          </div>
                                       </td>
                                       <td>
                                          <h6>Nariokali Borji</h6>
                                          <span class="text-body font-weight-400">8GB/80GB/SF02-Ubuntu Iconic- jfkakf-daksl...</span>
                                       </td>
                                       <td>192.168.130.26</td>
                                       <td>6 Months ago</td>
                                       <td>
                                          <div class="text-primary">Innohouse</div>
                                       </td>
                                       <td>Leoharshan</td>
                                       <td>
                                          <span class="text-black font-size-24" id="dropdownMenuButton6">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="avatar-40 text-center rounded-circle iq-bg-danger position-relative">
                                             <span class="font-size-20 align-item-center"><i class="fa fa-user" aria-hidden="true"></i><span class="bg-success dots"></span></span>
                                          </div>
                                       </td>
                                       <td>
                                          <h6>Bulesta Karolin</h6>
                                          <span class="text-body font-weight-400">8GB/80GB/SF02-Ubuntu Iconic- jfkakf-daksl...</span>
                                       </td>
                                       <td>192.168.130.26</td>
                                       <td>6 Months ago</td>
                                       <td>
                                          <div class="text-danger">Rodrigez</div>
                                       </td>
                                       <td>Karilorni</td>
                                       <td>
                                          <span class="text-black font-size-24" id="dropdownMenuButton7">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                       </td>
                                    </tr>
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