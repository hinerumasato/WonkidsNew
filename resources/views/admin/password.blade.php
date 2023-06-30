@extends('admin.layouts.setting')

@section('tab-content')
    <div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fa fa-exclamation-circle me-2"></i>
                @lang('validation.error')
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{route('admin.setting.password')}}" id="password-setting-form" method="POST">
            @csrf
            <h3 class="mb-4">Password Settings</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Old password</label>
                        <input name="old-password" type="password" class="form-control">
                        @error('old-password')
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>New password</label>
                        <input name="new-password" type="password" class="form-control">
                        @error('new-password')
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm new password</label>
                        <input name="new-password_confirmation" type="password" class="form-control">
                        @error('new-password_confirmation')
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary">Update</button>
                <button class="btn btn-light">Cancel</button>
            </div>
        </form>
    </div>
@endsection
