@extends('client.layouts.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">@lang('auth.form.reset-password')</h2>
        <form method="POST" action="{{ route('reset-password') }}" class="py-5" style="width: 800px; margin: 0 auto;">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.form.password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.form.password-confirmation') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="passwordConfirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection