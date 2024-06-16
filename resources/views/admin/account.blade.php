@extends('admin.layouts.setting')


@section('tab-content')
    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" id="avatar" style="display: none;">
            <h3 class="mb-4">Account Settings</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input name="first_name" type="text" class="form-control" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone number</label>
                        <input name="phone" type="text" class="form-control" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company</label>
                        <input name="company" type="text" class="form-control" value="{{ $user->company }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Designation</label>
                        <input name="designation" type="text" class="form-control" value="{{ $user->designation }}">
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('admin.setting.account') }}" class="btn btn-light">Cancel</a>
            </div>
    </div>
    </form>
    </div>
@endsection

@push('scripts')
    <script>
        function clickFile(selector) {
            const fileInput = document.querySelector(selector);
            fileInput.click();
        }

        function loadNewImage(selector) {
            const fileInput = document.querySelector(selector);
            const image = document.querySelector('.setting_avatar');

            fileInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.addEventListener('load', (event) => {
                    const contents = event.target.result;
                    image.src = contents;
                });

                reader.readAsDataURL(file);
            });
        }

        loadNewImage('#avatar');
    </script>
@endpush
