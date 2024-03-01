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
                                <p style="color: hsl(217, 10%, 50.8%)" class="fs-5">

                                    @lang('auth.welcome.content')
                                <p><a class="register-second-text"
                                        href="https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc">https://www.facebook.com/profile.php?id=100066749546942&mibextid=2JQ9oc</a>
                                </p style="color: hsl(217, 10%, 50.8%)">
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
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating">
                                                    <input type="text" id="registerName" class="form-control"
                                                        placeholder="" />
                                                    <label class="form-label" for="registerName">@lang('auth.form.name')*</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating">
                                                    <input type="text" id="registerPhone" class="form-control"
                                                        placeholder="" />
                                                    <label class="form-label" for="registerPhone">@lang('auth.form.phone')</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" id="registerChurch" class="form-control" placeholder="" />
                                            <label class="form-label" for="registerChurch">@lang('auth.form.church')*</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" id="registerBirthYear" class="form-control" placeholder="" />
                                            <label class="form-label" for="registerBirthYear">@lang('auth.form.year-of-birth')*</label>
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-floating mb-4">
                                            <input type="email" id="registerEmail" class="form-control" placeholder="" />
                                            <label class="form-label" for="registerEmail">@lang('auth.form.email')*</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-floating mb-4">
                                            <input type="password" id="registerPassword" class="form-control" placeholder="" />
                                            <label class="form-label" for="registerPassword">@lang('auth.form.password')*</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-floating mb-4">
                                            <input type="password" id="registerPasswordConfirmation" class="form-control" placeholder="" />
                                            <label class="form-label" for="registerPasswordConfirmation">@lang('auth.form.password-confirmation')*</label>
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
                                        <button type="submit" class="btn btn-block py-3 mb-4 w-100 fw-bold register-bg-color">
                                            @lang('auth.signup')
                                        </button>

                                        <p>
                                            @lang('auth.form.already-have-account') <a href="/client/login" class="register-second-text">@lang('auth.form.already-have-account-link')</a>
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
