<section id="smallNav">

    <div class="container mt-5">
        <nav class="d-lg-block d-none">
            {{-- <ul class="small-nav_list d-flex justify-content-center my-0">
                <li class="small-nav_item mx-3">
                    <a href="{{ route('posts.index') }}">
                        {{ trans('home.11-period') }}
                        <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                    </a>
                    {!! $smallNavHTML !!}
                </li>
                <li class="small-nav_item mx-3">
                    <a href="{{route('home.media.index')}}">
                        {{ trans('home.media-content') }}
                        <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                    </a>
    
                    <ul class="small-nav_sublist media-contents_sublist">
                        @foreach ($medias as $media)
                            <li class="small-nav_subitem">
                                <a href="{{route('home.media.index-slug', ['mediaSlug' => $media['slug']])}}" class="small-nav_sublink">{{ $media['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul> --}}
    
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('posts.index') }}">{{ trans('home.11-period') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.media.index') }}">{{ trans('home.media-content') }}</a>
                </li>
            </ul>
        </nav>
    
    
        <div class="d-block d-lg-none">
            <select name="" id="" class="w-100 text-center py-3 small-nav-select">
                <option value="{{ route('posts.index') }}">@lang('home.11-period')</option>
                <option value="{{ route('home.media.index') }}">@lang('home.media-content')</option>
            </select>
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('js/fittop.js') }}"></script>
    <script>
        const windowHref = window.location.href;
        const navItems = document.querySelectorAll('#smallNav .nav-item');
        navItems.forEach(item => {
            const a = item.querySelector('a');
            const link = a.getAttribute('href');
            console.log(link);
            if(windowHref.includes(link))
                a.classList.add('active');
        });
    </script>
    <script>
        const windowLink = window.location.href;
        const smallNavItems = document.querySelectorAll('.small-nav_item');
        smallNavItems.forEach(item => {
            const link = item.querySelector('a').getAttribute('href');
            if(windowLink.includes(link))
                item.classList.add('active');
        });
        fitTop('.small-nav_sublist', '.small-nav_subitem');
    </script>

    <script>
        const selectElement = document.querySelector('select');
        selectElement.value = window.location.href;
        selectElement.onchange = () => window.location.replace(selectElement.value);
    </script>
@endpush