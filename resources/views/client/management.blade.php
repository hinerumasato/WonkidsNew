@extends('client.layouts.master')
@section('content')
@include('client.partials.small-slider')
@include('client.partials.small-nav-wonkidsclub')
<div class="container">
    <ul style="list-style: upper-roman" class="fw-bold fs-3 upper-roman-list">
        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.teacher')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.teacher.item.1')</li>
                <li>@lang('management.teacher.item.2')</li>
            </ul>
        </li>
        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.student')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.student.item.1')</li>
                <li>@lang('management.student.item.2')</li>
            </ul>
        </li>
        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.curriculum')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.curriculum.item.1')</li>
                <li>@lang('management.curriculum.item.2')</li>
                <li>@lang('management.curriculum.item.3')</li>
            </ul>
        </li>
        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.preparation')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.preparation.item.1')</li>
                <li>@lang('management.preparation.item.2')</li>
                <li>@lang('management.preparation.item.3')</li>
                <li>@lang('management.preparation.item.4')</li>
            </ul>
        </li>
        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.operation')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.operation.item.1')</li>
                <li>@lang('management.operation.item.2')</li>
                <li>@lang('management.operation.item.3')</li>
                <li>@lang('management.operation.item.4')</li>
                <li>@lang('management.operation.item.5')</li>
                <li>@lang('management.operation.item.6')</li>
            </ul>
        </li>

        <li class="my-5 mx-4">
            <h2 class="mb-3 fw-bold fs-3">@lang('management.evaluation')</h2>
            <ul style="list-style: decimal" class="fs-5 fw-normal">
                <li>@lang('management.evaluation.item.1')</li>
                <li>@lang('management.evaluation.item.2')</li>
            </ul>
        </li>
    </ul>
</div>
@endsection
