@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    @php
        use App\Helpers\LoopHelper;
        use App\Helpers\StringHelper;
        $levelCategories = LoopHelper::dataTree($categories);
    @endphp

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-block d-md-flex align-items-center justify-content-between mb-4">
                <div class="d-block d-md-flex align-items-center">
                    <h6 class="mb-md-0 mb-2 text-start">{{ trans('admin.post') }}</h6>

                    <select name="language_id" class="py-1 mx-md-2 mb-md-0 mb-2 border border-none language-select"
                        aria-label="Default select example">
                        @foreach ($languages as $language)
                        <option link="{{ route('admin.index') }}" value="{{ $language->locale }}">{{ $language->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    <select name="category_id" class="py-1 mx-md-2 mb-md-0 mb-2 border border-none category-select"
                    aria-label="Default select example">
                            <option categoryText="{{ trans('admin.all') }}" value="0" selected>{{ trans('admin.all') }}</option>
                        @foreach ($levelCategories as $category)
                            <option categoryText="{{ $category->pivot->name }}" value="{{ $category->id }}">{{ StringHelper::gerateLineByLevel($category->level).$category->pivot->name }}
                            </option>
                        @endforeach
                    </select>


                    <button class="mb-md-0 mb-2 btn btn-danger d-none btn-delete-all" data-bs-toggle="modal"
                        data-bs-target="#deleteSelectModal">
                        <i class="fa-solid fa-trash"></i>
                        {{ trans('admin.delete-selected') }}
                    </button>
                </div>
                <a href="{{ route('admin.posts.add') }}" class="btn btn-primary add-post-btn">+ {{ trans('admin.add-post') }}</a>
            </div>
            <div class="search-wrap d-flex justify-content-start align-items-center mb-3">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" class="border-0 search-input h-100 w-100" type="search" placeholder="{{ trans('general.search') }}..." id="post-search">
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input check-all-input" type="checkbox"></th>
                            <th scope="col">{{ trans('admin.title') }}</th>
                            <th class="d-none d-md-table-cell" scope="col">{{ trans('admin.date-post') }}</th>
                            <th class="d-none d-md-table-cell" scope="col">{{ trans('admin.date-edit') }}</th>
                            <th scope="col">{{ trans('admin.edit') }}</th>
                            <th scope="col">{{ trans('admin.delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                {{ session('msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (empty($posts))
                            <tr role="alert">
                                <td colspan="6">
                                    <p class="alert alert-primary text-center">{{ trans('admin.empty-post') }}</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($posts as $post)
                                <tr>
                                    <td><input class="form-check-input check-input" type="checkbox"></td>
                                    <td>{{ $post['title'] }}</td>
                                    <td class="d-none d-md-table-cell">{{ $post['created_at'] }}</td>
                                    <td class="d-none d-md-table-cell">{{ $post['updated_at'] }}</td>
                                    <td><a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.posts.edit', ['post_id' => $post['post_id'], 'language_id' => $languageId]) }}">{{ trans('admin.edit') }}</a>
                                    </td>
                                    <td>
                                        <button postid="{{ $post['post_id'] }}"
                                            class="btn btn-sm btn-danger btn-modal btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            {{ trans('admin.delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                </table>
                <div class="mt-4">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xoá bài viết này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button link="{{ route('admin.posts.deleteOne', ['post_id' => 0]) }}" type="button"
                        class="btn btn-danger btn-submit" onclick="submitDelete();">Xoá</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSelectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xoá các bài viết đã chọn?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger btn-submit" onclick="submitSelectDelete();">Xoá</button>
                </div>
            </div>
        </div>
    </div>

    <form id="deletePostForm" action="" method="POST">
        @method('delete')
        @csrf
        <input type="hidden" name="postIds">
    </form>

@endsection

@section('scripts')
    <script>
        const languageLocale = @json($languageLocale);
        const postCategoryId = @json($post_category_id);
        const deleteLink = @json(route('admin.posts.deleteMany'));
        const changeLocaleLink = @json(route('change-language', ['locale' => 'vi']));
    </script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
