<div class="container mt-5">
    <nav>
        <ul class="small-nav_list d-lg-flex justify-content-center my-0 d-none">
            <li class="small-nav_item mx-3">
                <a href="{{route('home.about-us')}}">
                    @lang('general.about-us')
                </a>
            </li>

            <li class="small-nav_item mx-3">
                <a href="{{route('home.management')}}">
                    @lang('general.management')
                </a>
            </li>
        </ul>
    </nav>

    <div class="d-block d-lg-none">
        <select name="" id="" class="w-100 text-center py-3 small-nav-select">
            <option value="{{ route('home.about-us') }}">@lang('general.about-us')</option>
            <option value="{{ route('home.management') }}">@lang('general.management')</option>
        </select>
    </div>

    <hr>
</div>

@push('scripts')
    <script src="{{ asset('js/fittop.js') }}"></script>
    <script>
        const windowLink = window.location.href;
        const smallNavItems = document.querySelectorAll('.small-nav_item')
        smallNavItems.forEach(item => {
            const link = item.querySelector('a').getAttribute('href');
            if (windowLink.includes(link))
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
