<div class="profile-tab-nav border-right">
    <div class="p-4">
        <div class="img-circle text-center mb-3">
            <img onclick="clickFile('#avatar')" src="{{ $user->avatar }}" alt="Image" class="shadow setting_avatar">
        </div>
        <h4 class="text-center">{{ $user->name }}</h4>
    </div>
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link" id="account-tab" data-toggle="pill" href="{{route('admin.setting.account')}}" role="tab"
            aria-controls="account" aria-selected="true">
            <i class="fa fa-home text-center mr-1"></i>
            Account
        </a>
        <a class="nav-link" id="password-tab" data-toggle="pill" href="{{route('admin.setting.password')}}" role="tab"
            aria-controls="password" aria-selected="false">
            <i class="fa fa-key text-center mr-1"></i>
            Password
        </a>
        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab"
            aria-controls="security" aria-selected="false">
            <i class="fa fa-user text-center mr-1"></i>
            Security
        </a>
        <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab"
            aria-controls="application" aria-selected="false">
            <i class="fa fa-tv text-center mr-1"></i>
            Application
        </a>
        <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab"
            aria-controls="notification" aria-selected="false">
            <i class="fa fa-bell text-center mr-1"></i>
            Notification
        </a>
    </div>
</div>

@push('scripts')
    <script src="{{asset('js/profileNav.js')}}"></script>
@endpush