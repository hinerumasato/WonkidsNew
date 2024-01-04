@extends('client.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/auth-client.css')}}">
@endsection
@section('content')
    <div class="container">
        <!-- Section: Design Block -->
        <div class="d-flex justify-content-center align-items-center mt-5">

            <section class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0 d-lg-block d-none">
                                <h1 class="my-5 display-3 fw-bold ls-tight text-center" style="font-size: 55px">
                                    Chào mừng đã đến với <br />
                                    <span class="fw-bold register-text-color">Wonkidsclub</span>
                                </h1>
                                <p style="color: hsl(217, 10%, 50.8%)">

                                    Cảm ơn bạn đã quan tâm và sử dụng tài liệu của chúng tôi. Để có thể tải tất cả tài liệu
                                    mong bạn dành ít thời gian đăng nhập/ đăng ký. Nếu có bất kỳ thắc mắc hoặc cần sự hỗ
                                    trợ, xin vui lòng liên hệ với chúng tôi qua số ĐT 070 771 7745 hoặc Fanpage Facebook:
                                <p><a class="register-second-text"
                                        href="https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc">https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc</a>
                                </p>
                                Xin chân thành cảm ơn.
                                </p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <div class="d-flex justify-content-center">
                                            <img src="https://wonkidsclub.net/imgs/sliders/wonkidsclub_logo_slider.png"
                                                alt="" width="60%">
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-floating mb-4">
                                            <input type="email" id="loginEmail" class="form-control" placeholder="" />
                                            <label class="form-label" for="loginEmail">Địa chỉ Email*</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-floating mb-4">
                                            <input type="password" id="loginPassword" class="form-control" placeholder="" />
                                            <label class="form-label" for="loginPassword">Password*</label>
                                        </div>

                                        <!-- Checkbox
                                                    <div class="form-check d-flex justify-content-center mb-4">
                                                        <input class="form-check-input me-2" type="checkbox" value
                                                            placeholder=""="" id="form2Example33" checked />
                                                        <label class="form-check-label" for="form2Example33">
                                                            Subscribe to our newsletter
                                                        </label>
                                                    </div> -->

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-block mb-4 w-100 fw-bold register-bg-color py-3">
                                            Đăng nhập
                                        </button>

                                        <p>
                                            Bạn chưa có tài khoản? <a href="/client/register" class="register-second-text">Vui lòng
                                                đăng
                                                ký tại đây</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/auth.js')}}"></script>
@endsection