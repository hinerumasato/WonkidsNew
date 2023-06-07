@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/qa.css')}}">
@endsection

@section('content')
    <div class="container my-5">
        <div class="row gx-5">
            <div class="col-xl-9 col-12">
                @foreach ($qas as $qa)
                    <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                        <div class="col-lg-2 col-sm-12">
                            <img class="rounded-circle" src="{{asset('imgs/avatar/default_user_avatar.png')}}" alt="">
                        </div>
                        <div class="col-lg-10 col-sm-12">
                            <div class="row d-flex align-items-center">
                                <h2 class="col-xl-7 col-lg-12">{{ $qa->title }}</h2>
                                <div class="col-xl-5 col-lg-12 button-wrap d-xl-flex justify-content-end">
                                    <button class="me-2 bg-primary text-white border border-0">
                                        <i class="fa-solid fa-question"></i>
                                        {{ trans('qa.question') }}
                                    </button>
                                    <a href="{{route('admin.qa.answer', ['id' => $qa->id])}}" class="bg-black text-white border border-0 text-decoration-none px-2">{{ trans('qa.report') }}</a>
                                </div>
                            </div>
                            <div class="lh-base fs-6">
                                {{ $qa->message }}
                            </div>
                            <div class="d-md-flex mt-3 qa-info d-sm-block">
                                @php
                                    $solved = '';
                                    if($qa->solved == 1)
                                        $solved = 'solved';
                                    else if($qa->answered == 1)
                                        $solved = 'answered';
                                @endphp
                                <p class="problem {{$solved}}"><i class="fa-solid"></i>  </p>
                                <p>
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $qa->time }}
                                </p>
                                <p>
                                    <i class="fa-solid fa-user"></i>
                                    {{ $qa->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-xl-3" style="height: fit-content">
                <div class="stats d-none d-xl-block shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    <h2 class="fs-3 text-primary">Stats</h2>
                    <hr>
                    <div class="text-white bg-danger my-3 py-3 fw-bold fs-6 px-2">{{ trans('qa.question') }} ({{ count($questions) }})</div>
                    <div class="text-white bg-success my-3 py-3 fw-bold fs-6 px-2">{{ trans('qa.answer') }} ({{ count($answered) }})</div>
                </div>
                <div class="find-us d-none d-xl-block shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    <h2 class="fs-3 text-primary">Find Us</h2>
                    <hr>
                    <div class="bg-warning d-flex justify-content-between fs-5 fw-bold px-2 align-items-center text-white py-3">
                        <div>
                            Home Page
                        </div>
                        <i class="fa-solid fa-wifi"></i>
                    </div>

                    <div class="bg-primary d-flex justify-content-between fs-5 fw-bold px-2 align-items-center text-white py-3">
                        <div>
                            Facebook
                        </div>
                        <i class="fa-brands fa-facebook"></i>
                    </div>

                    <div class="bg-info d-flex justify-content-between fs-5 fw-bold px-2 align-items-center text-white py-3">
                        <div>
                            Twitter
                        </div>
                        <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                    </div>

                    <div class="bg-danger d-flex justify-content-between fs-5 fw-bold px-2 align-items-center text-white py-3">
                        <div>
                            Youtube
                        </div>
                        <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $qas->links() }}
@endsection

@section('scripts')
    <script>
        const problems = document.querySelectorAll('.problem');
        problems.forEach(problem => {
            if(problem.classList.contains('solved')) {
                const icon = problem.querySelector('.fa-solid');
                icon.classList.add('fa-check');
                problem.innerHTML += @json(trans('qa.solved'));
            }

            else if(problem.classList.contains('answered')) {
                const icon = problem.querySelector('.fa-solid');
                icon.classList.add('fa-flag');
                problem.innerHTML += @json(trans('qa.answered'));
            }

            else {
                const icon = problem.querySelector('.fa-solid');
                icon.classList.add('fa-xmark');
                problem.innerHTML += @json(trans('qa.in-progress'));
            } 
        });
    </script>
@endsection