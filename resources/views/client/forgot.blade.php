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
                            <h1 class="my-5 display-3 fw-bold ls-tight text-center" style="font-size: 50px">
                                @lang('auth.welcome.title')
                            </h1>
                            <p style="color: hsl(217, 10%, 50.8%)">

                                @lang('auth.welcome.content')
                            <p><a class="register-second-text"
                                    href="https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc">https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc</a>
                            </p>
                                @lang('auth.welcome.appreciate')
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
                                        <label class="form-label" for="loginEmail">@lang('auth.form.email')*</label>
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
                                        @lang('auth.form.reset-password')
                                    </button>

                                    <p>
                                        @lang('auth.form.still-not-have-account') <a href="/client/register" class="register-second-text">@lang('auth.form.register-here')</a>
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