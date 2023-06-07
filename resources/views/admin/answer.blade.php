@extends('admin.layouts.master')
@section('content')
    <div class="container question">
        <div class="row shadow-sm p-3 my-5 bg-body-tertiary rounded">
            <div class="col-lg-2 col-sm-12">
                <img class="rounded-circle" src="{{ asset('imgs/avatar/default_user_avatar.png') }}" alt="">
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="row d-flex align-items-center">
                    <h2 class="col-xl-7 col-lg-12">{{ $qa->title }}</h2>
                </div>
                <div class="lh-base fs-6">
                    {{ $qa->message }}
                </div>
            </div>
        </div>

        <div class="answer">
            <form action="" class="answer_form" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fs-5 fw-bold">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title...">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label fs-5 fw-bold">Answer Content</label>
                    <textarea name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="d-lg-flex d-block justify-content-end">
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary w-100">Answer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection