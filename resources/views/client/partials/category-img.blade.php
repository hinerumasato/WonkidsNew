@push('css')
    <style>
        .category-name {
            color: #3771AD;
            font-family: 'Times New Roman', Times, serif
        }

        .category-wrap:hover .category-name {
            text-decoration: underline;
        }

        @media (max-width: 485px) {
            .category-name {
                font-size: 10px;
            }
        }

        @media (max-width: 430px) {
            .category-wrap {
                height: 150px;
            }

            .category-name {
                font-size: 10px;
            }
        }
    </style>
@endpush

<div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 py-5 ">
    @foreach ($oneLevelCategories as $index => $category)
        <div class="col my-2 category-wrap">
            <a href="{{ route('posts.index', ['category' => $category['id']]) }}" class="text-decoration-none d-block w-100 h-100 text-dark">
                <img data-src="{{ $categoryImgs[$index] }}"
                    src="{{ asset('imgs/transparent/transparent.png') }}" alt="" class="category-img w-100 placeholder" height="80%">
                
                <p class="category-name text-center fw-bold mt-3">{{ $categoryNames[$index] }}</p>
            </a>
        </div>
    @endforeach
</div>

@push('scripts')
    <script>
        function squareImage() {
            const categoryImgs = document.querySelectorAll('.category-img');
            categoryImgs.forEach(img => {
                img.style.height = img.offsetWidth + 'px';
            });
        }
        window.onresize = () => {
            squareImage();
        }
        squareImage();
    </script>
@endpush