@extends('client.layouts.master')
@section('content')
@include('client.partials.small-slider')
@include('client.partials.small-nav-wonkidsclub')

<div class="about-us_container container">
    <section class="about-us_section">
        <h2 class="about-us_title">@lang('about-us.background')</h2>
        <p class="about-us_content">
            @lang('about-us.background.content')
        </p>
    </section>

    <section class="about-us_section">
        <h2 class="about-us_title">@lang('about-us.value')</h2>
        <p class="about-us_content">
            @lang('about-us.value.content')
        </p>
    </section>

    <section class="about-us_section">
        <ul>
            <h2 class="about-us_title">@lang('about-us.purpose')</h2>
            <li>@lang('about-us.purpose.item.1')</li>
            <li>@lang('about-us.purpose.item.2')</li>
            <li>@lang('about-us.purpose.item.3')</li>
            <li>@lang('about-us.purpose.item.4')</li>
            <li>@lang('about-us.purpose.item.5')</li>
        </ul>
    </section>


    <section class="about-us_section">
        <ul>
            <h2 class="about-us_title">@lang('about-us.methods')</h2>
            <li>@lang('about-us.methods.item.1')</li>
            <li>@lang('about-us.methods.item.2')</li>
            <li>@lang('about-us.methods.item.3')</li>
        </ul>
    </section>


</div>
@endsection
