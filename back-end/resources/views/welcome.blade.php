@extends('part.app')

@section('content')
    <!-- Masuk Start -->
        <section class="sign-in-page">
          <div class="container p-0" id="sign-in-page-box">
                <div class="bg-white form-container sign-up-container">
                   <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                          <h1 class="mb-3 text-center">Daftar</h1>
                          <p class="text-center text-dark">Masukkan data anda untuk memulai bergabung dengan kami.</p>
                          <form class="mt-4" action="{{ route("users.register") }}" method="POST">
                                @csrf
                              <div class="form-group">
                                  <label for="exampleInputName1">Nama Lengkap</label>
                                  <input type="text" class="form-control mb-0" name="name" id="exampleInputName1" placeholder="Nama Lengkap" @required(true)>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail2">Alamat Email</label>
                                  <input type="email" class="form-control mb-0" name="email" id="exampleInputEmail2" placeholder="Alamat Email" @required(true)>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Kata Sandi</label>
                                  <input type="password" class="form-control mb-0" name="password" id="exampleInputPassword1" placeholder="Kata Sandi" @required(true)>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Konfirmasi Kata Sandi</label>
                                  <input type="password" class="form-control mb-0" name="password_conf" id="exampleInputPassword1" placeholder="Konfirmasi Kata Sandi" @required(true)>
                              </div>
                              <div class="sign-info">
                                  <button type="submit" name="register" value="true" class="btn btn-primary mb-2">Daftar</button>
                                  <span class="text-dark d-block line-height-2">Sudah punya akun? <a href="#">Masuk</a></span>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
                <div class="bg-white form-container sign-in-container">
                    <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                            @if (($alertclass = Session::get('alertclass')) && ($message = Session::get('message')))
                                {{-- {{ $message }} --}}
                                <div class="alert alert-{{ $alertclass }} alert-block">
                                    {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          <h1 class="mb-3 text-center">Masuk</h1>
                          <p class="text-center text-dark">Masukkan alamat email dan kata sandi anda untuk login ke sistem.</p>
                          <form class="mt-4" action="{{ route('users.login') }}" method="POST">
                                @csrf
                              <div class="form-group">
                                  <label for="exampleInputEmail2">Alamat Email</label>
                                  <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" @required(true)>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword2">Kata Sandi</label>
                                  <a href="#" class="float-right">Lupa kata sandi?</a>
                                  <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" @required(true)>
                              </div>
                              <div class="d-inline-block w-100">
                                  <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                                      <label class="custom-control-label" for="customCheck1">Ingatkan saya!</label>
                                  </div>
                              </div>
                              <div class="sign-info">
                                  <button type="submit" name="login" value="true" class="btn btn-primary mb-2">Masuk</button>
                                  <span class="text-dark dark-color d-block line-height-2">Belum punya akun? <a href="#">Daftar</a></span>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1 class="p-4 text-white">HW Group</h1>
                            <p>Untuk Tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda.</p>
                            <button class="btn iq-border-primary mt-2" id="signIn">Masuk</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1 class="p-4 text-white">HW Group</h1>
                            <p>Masukkan detail pribadi Anda dan mulailah perjalanan bersama kami!</p>
                            <button class="btn iq-border-primary mt-2" id="signUp">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Masuk END -->
@endsection