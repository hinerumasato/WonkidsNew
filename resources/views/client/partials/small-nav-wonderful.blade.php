<div class="container mt-5">
    <nav>
        <ul class="small-nav_list d-flex justify-content-center my-0">
            <li class="small-nav_item mx-3">
                <a href="{{route('home.book')}}">
                    @lang('general.book')
                    <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                </a>
                <ul class="small-nav_sublist media-contents_sublist">
                    <li class="small-nav_subitem"><a href="{{route('home.book')}}" class="small-nav_sublink">@lang('general.introduction')</a></li>
                    <li class="small-nav_subitem"><a href="" class="small-nav_sublink">@lang('general.document-share')</a></li>
                </ul>
            </li>
            <li class="small-nav_item mx-3">
                <a href="{{route('home.camp')}}">
                    @lang('general.camp')
                    <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                </a>
                <ul class="small-nav_sublist media-contents_sublist">
                    <li class="small-nav_subitem"><a href="{{route('home.camp')}}" class="small-nav_sublink">@lang('general.introduction')</a></li>
                    <li class="small-nav_subitem"><a href="" class="small-nav_sublink">@lang('general.document-share')</a></li>
                </ul>
            </li>
            <li class="small-nav_item mx-3">
                <a href="{{route('home.wonkidsclub')}}">
                    @lang('general.club')
                    <i class="fa-solid fa-angle-down" style="font-size: 9px"></i>
                </a>
                <ul class="small-nav_sublist media-contents_sublist">
                    <li class="small-nav_subitem"><a href="{{route('home.wonkidsclub')}}" class="small-nav_sublink">@lang('general.introduction')</a></li>
                    <li class="small-nav_subitem"><a href="" class="small-nav_sublink">@lang('general.document-share')</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <hr>
</div>

@push('scripts')
    <script src="{{ asset('js/fittop.js') }}"></script>
    <script>
        const windowLink = window.location.href;
        const smallNavItems = document.querySelectorAll('.small-nav_item')
        smallNavItems.forEach(item => {
            const link = item.querySelector('a').getAttribute('href');
            if(windowLink.includes(link))
                item.classList.add('active');
        });
        fitTop('.small-nav_sublist', '.small-nav_subitem');
    </script>
@endpush