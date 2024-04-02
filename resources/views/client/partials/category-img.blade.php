<div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 py-5 ">
    @foreach ($categoriesData as $data)
        <div class="col my-2 category-wrap">
            <a href="{{ route('posts.index', ['category' => $data->id]) }}" class="text-decoration-none d-block w-100 h-100 text-dark">
                <img data-src="{{ $data->img }}"
                    src="{{ asset('imgs/transparent/transparent.png') }}" alt="" class="category-img w-100 placeholder" height="80%">
                
                <p class="category-name text-center fw-bold mt-3">{{ $data->name }}</p>
            </a>
        </div>
    @endforeach
</div>

@push('scripts')
    <script>

        const app = {

            categoryImgs: document.querySelectorAll('.category-img'),

            squareImage: function() {
                this.categoryImgs.forEach(img => {
                    img.style.height = img.offsetWidth + 'px';
                });
            },

            animateImage: function(image) {
                image.classList.add('animate__animated', 'animate__pulse', 'animate__faster');
            },

            removeAnimateImage(image) {
                image.classList.remove('animate__animated', 'animate__pulse', 'animate__faster');
            },

            initialization: function() {
                this.squareImage();
            },

            handleEvents: function() {
                window.onresize = () => this.squareImage();
                this.categoryImgs.forEach(image => {
                    image.onmouseover = () => this.animateImage(image);
                    image.onmouseleave = () => this.removeAnimateImage(image);
                });
            },

            start: function() {
                this.initialization();
                this.handleEvents();
            }
        }.start();

    </script>
@endpush