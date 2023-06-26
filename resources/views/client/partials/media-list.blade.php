<div class="container mb-3">
    <ul class="nav nav-tabs">
        @foreach ($mediaNavs as $media)
            <li class="nav-item">
                <a slug="{{ $media['slug'] }}" class="nav-link text-dark bg-body-tertiary rounded-0" aria-current="page"
                    href="{{ route('home.media.index-slug', ['mediaSlug' => $media['slug']]) }}">{{ $media['name'] }}</a>
            </li>
        @endforeach
    </ul>
</div>

@push('scripts')
    <script>
        function activeNavHandler() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                const slug = encodeURIComponent(link.getAttribute('slug'));
                const href = window.location.href;
                if(href.includes(slug)) {
                    link.classList.add('active');
                    link.classList.remove('bg-body-tertiary');
                }
            });
        }   
        activeNavHandler();
    </script>
@endpush
