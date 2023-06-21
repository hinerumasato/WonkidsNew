@php
    use App\Models\Message;
    use App\Models\User;
    
    $messages = Message::where('receive_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
    $sendUsers = [];
    foreach ($messages as $message) {
        $sendUsers[] = User::find($message->send_id);
    }
    
@endphp

<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2 message"></i>
                <span class="d-none d-lg-inline-flex">{{ trans('general.message') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                @foreach ($sendUsers as $key => $sendUser)
                    <a href="{{route('admin.messages.detail', ['id' => $messages[$key]])}}" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="{{ $sendUser->avatar }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">{{ $sendUser->name }} {{ trans('admin.header.send-you-a-message') }}</h6>
                                <small>{{ $messages[$key]->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                @endforeach
                <a href="#" class="dropdown-item text-center">{{ trans('admin.header.see-all-message') }}</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">{{ trans('general.notification') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ $user->avatar }}" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ $user->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('admin.profile') }}" class="dropdown-item">{{ trans('admin.header.my-profile') }}</a>
                <a href="{{ route('admin.setting') }}" class="dropdown-item">{{ trans('admin.header.settings') }}</a>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('admin.header.logout') }}</a>
            </div>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@push('scripts')
    <script>
        const messageIcon = document.querySelector('.message');
        function checkHasUnreadMessage() {
            const messages = @json($messages);
            let count = 0;
            messages.forEach(message => {
                if(message.read === 0) {
                    count++;
                }
            });

            if(count !== 0)
                return true;
            else return false;

        }

        console.log(checkHasUnreadMessage());

        if(checkHasUnreadMessage() == true) {
            messageIcon.classList.add('unread');
        }
        else messageIcon.classList.remove('unread');

    </script>
@endpush
