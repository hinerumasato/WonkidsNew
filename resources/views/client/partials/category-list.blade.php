@php
    use App\Helpers\LoopHelper;
    use App\Models\Category;

    $categoryHrefId = request()->input('category');
    $parentIds = LoopHelper::getIdArrayByData(Category::find($categoryHrefId));

@endphp

{!! LoopHelper::buildCategorySubListHTML(Category::find($categoryHrefId) ,'category-list', 'category-item', 'category-link'); !!}

<hr>

@push('scripts')
    <script>

        function setDisplayCategoryList(listSelector) {
            const categoryLists = document.querySelectorAll(listSelector);
            categoryLists.forEach(list => {
                if(list.textContent.trim() == '')
                    list.style.display = 'none';
            })
        }

        function categoryHandle(itemSelector) {
            const categoryItems = document.querySelectorAll(itemSelector);
            categoryItems.forEach(item => {
                const currentLink = window.location.href;
                const itemLink = item.querySelector('a').href;
                if(itemLink == currentLink)
                    item.classList.add('open');
                else {
                    if(item.classList.contains('open'))
                        item.classList.remove('open');
                }
            });

            const parentIds = @json($parentIds);
            console.log(parentIds);
            parentIds.forEach(id => {
                categoryItems.forEach(item => {
                    const itemId = parseInt(item.querySelector('a').href.split('=')[1]);
                    if(itemId == id)
                        item.classList.add('open');
                });
            });
        }        

        categoryHandle('.category-item');
        setDisplayCategoryList('.category-list');
    </script>
@endpush