<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{$user->avatar}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ $user->name }}</h6>
                <span style="text-transform: capitalize">{{ $user->role->name }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('admin.index')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>{{ trans('admin.posts') }}</a>
            <a href="{{route('admin.qa.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>{{ trans('admin.qa') }}</a>
            <a href="{{route('admin.member.index')}}" class="nav-item nav-link"><i class="fa-solid fa-users"></i>{{ trans('admin.members') }}</a>
            <a href="{{route('admin.ui.slider')}}" class="nav-item nav-link"><i class="fa-solid fa-display"></i>@lang('admin.ui.setting')</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

@push('scripts')
    <script>
        const currentUrl = window.location.href;
        const navItems = document.querySelectorAll('.nav-item.nav-link');
        navItems.forEach(item => {
            if(currentUrl.includes(item.getAttribute('href')))
                item.classList.add('active');
        });
    </script>
@endpush