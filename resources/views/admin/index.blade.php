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
                    <h6 class="mb-md-0 mb-2 text-start">Bài Đăng</h6>

                    <select name="language_id" class="py-1 mx-md-2 mb-md-0 mb-2 border border-none language-select"
                        aria-label="Default select example">
                        @foreach ($languages as $language)
                        <option link="{{ route('admin.index') }}" value="{{ $language->locale }}">{{ $language->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    <select name="category_id" class="py-1 mx-md-2 mb-md-0 mb-2 border border-none category-select"
                    aria-label="Default select example">
                            <option categoryText="Tất cả" value="0" selected>Tất cả</option>
                        @foreach ($levelCategories as $category)
                            <option categoryText="{{ $category->pivot->name }}" value="{{ $category->id }}">{{ StringHelper::gerateLineByLevel($category->level).$category->pivot->name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="mb-md-0 mb-2 btn btn-danger d-none btn-delete-all" data-bs-toggle="modal"
                        data-bs-target="#deleteSelectModal">
                        <i class="fa-solid fa-trash"></i>
                        Xoá đã chọn
                    </button>
                </div>
                <a href="{{ route('admin.posts.add') }}" class="btn btn-primary add-post-btn">+ Thêm bài viết</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input check-all-input" type="checkbox"></th>
                            <th scope="col">Tiêu đề</th>
                            <th class="d-none d-md-table-cell" scope="col">Ngày Đăng</th>
                            <th class="d-none d-md-table-cell" scope="col">Ngày Sửa</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xoá</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif


                        @if (empty($posts))
                            <tr role="alert">
                                <td colspan="6">
                                    <p class="alert alert-primary text-center">Chưa có bài viết nào</p>
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
                                            href="{{ route('admin.posts.edit', ['post_id' => $post['post_id'], 'language_id' => $languageId]) }}">Sửa</a>
                                    </td>
                                    <td>
                                        <button postid="{{ $post['post_id'] }}"
                                            class="btn btn-sm btn-danger btn-modal btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            Xoá
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                </table>
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
        function changeSelect() {
            let link = new URL(window.location.href);
            const params = new URLSearchParams();
            const languageSelect = document.querySelector('.language-select');
            const categorySelect = document.querySelector('.category-select');
            
            
            languageSelect.value = @json($languageLocale);
            categorySelect.value = @json($post_category_id);

            const option = categorySelect.options[categorySelect.selectedIndex];
            option.textContent = option.getAttribute('categoryText');

            languageSelect.onchange = () => {
                link = new URL(window.location.href);
                const selectedIndex = languageSelect.selectedIndex;
                params.append('post_lang', languageSelect.value);
                params.append('post_category', categorySelect.value);
                link.search = params.toString();
                window.location.replace(link.toString());
            }

            categorySelect.onchange = () => {
                link = new URL(window.location.href);
                const selectedIndex = categorySelect.selectedIndex;
                params.append('post_lang', languageSelect.value);
                params.append('post_category', categorySelect.value);
                link.search = params.toString();
                window.location.replace(link.toString());
            }
        }

        function passDataToModal() {
            const btnModals = document.querySelectorAll('.btn-modal');
            btnModals.forEach(btn => {
                btn.onclick = () => {
                    const postId = btn.getAttribute("postid");
                    const btnSubmit = document.querySelector('.btn-submit');
                    let link = btnSubmit.getAttribute('link');
                    let formatLink = link.slice(0, -1) + postId;
                    const deleteForm = document.getElementById('deletePostForm');
                    deleteForm.setAttribute("action", formatLink);
                }
            });
        }

        function submitDelete() {
            const deleteForm = document.getElementById('deletePostForm');
            deleteForm.submit();
        }

        function submitSelectDelete() {
            const deleteForm = document.getElementById('deletePostForm');
            const input = deleteForm.querySelector('input[name="postIds"]');
            const selectedCheckboxs = document.querySelectorAll('.check-input');
            const postIds = [];
            const submitLink = @json(route('admin.posts.deleteMany'));
            deleteForm.setAttribute('action', submitLink);
            selectedCheckboxs.forEach((checkbox, index) => {
                if (checkbox.checked)
                    postIds.push(parseInt(document.querySelectorAll('.btn-delete')[index].getAttribute('postId')));
            })
            input.value = postIds;
            deleteForm.submit();
        }

        function displayDeleteAll(deleteAllBtn) {
            deleteAllBtn.classList.remove('d-none');
            deleteAllBtn.classList.add('d-block');
        }

        function undisplayDeleteAll(deleteAllBtn) {
            deleteAllBtn.classList.remove('d-block');
            deleteAllBtn.classList.add('d-none');
        }

        function checkAll() {
            const checkboxs = document.querySelectorAll('.check-input');
            const checkAll = document.querySelector('.check-all-input');
            const deleteAllBtn = document.querySelector('.btn-delete-all');
            let countSelected = 0;
            checkboxs.forEach(checkbox => {
                checkbox.onclick = () => {
                    if (checkbox.checked)
                        countSelected++;
                    else
                        countSelected--;

                    if (countSelected === checkboxs.length)
                        checkAll.checked = true;
                    else checkAll.checked = false;

                    if (countSelected > 0) {
                        displayDeleteAll(deleteAllBtn);
                    } else {
                        undisplayDeleteAll(deleteAllBtn);
                    }
                }
            });


            checkAll.onclick = () => {
                if (checkAll.checked) {
                    countSelected = checkboxs.length;
                    checkboxs.forEach(checkbox => {
                        checkbox.checked = true;
                    });
                } else {
                    countSelected = 0;
                    checkboxs.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                }
                if (countSelected > 0) {
                    displayDeleteAll(deleteAllBtn);
                } else {
                    undisplayDeleteAll(deleteAllBtn);
                }
            }
        }

        checkAll();
        passDataToModal();
        changeSelect();
    </script>
@endsection
