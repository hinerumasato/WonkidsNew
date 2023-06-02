@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-start align-items-center">
                    <h6 style="width: 190px" class="mb-0">Bài Đăng</h6>
                    
                    <select name="language_id" class="form-select language-select" aria-label="Default select example">
                        @foreach ($languages as $language)
                            <option link="{{route('admin.index')}}" value="{{$language->locale}}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{route('admin.posts.add')}}" class="btn btn-primary">+ Thêm bài viết</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ngày Đăng</th>
                            <th scope="col">Ngày Sửa</th>
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


                        @if (empty($posts->toArray()))
                            <tr role="alert">
                                <td colspan="6">
                                    <p class="alert alert-primary text-center">Chưa có bài viết nào</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($posts as $post)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $post->pivot->title }}</td>
                                    <td>{{ $post->pivot->created_at }}</td>
                                    <td>{{ $post->pivot->updated_at }}</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{route("admin.posts.edit", ['post_id' => $post->id, 'language_id' => $languageId ])}}">Sửa</a></td>
                                    <td>
                                        <button postid="{{$post->id}}" class="btn btn-sm btn-danger btn-modal" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                    <button link="{{route('admin.posts.delete', ['post_id' => 0])}}" type="button" class="btn btn-danger btn-submit" onclick="submitDelete();">Xoá</button>
                </div>
            </div>
        </div>
    </div>

    <form id="deletePostForm" action="" method="POST">
        @method('delete')
        @csrf
    </form>

@endsection

@section('scripts')
    <script>
        function changeLanguagePost() {
            const languageSelect = document.querySelector('.language-select');
            languageSelect.value = @json($languageLocale);
            languageSelect.onchange = () => {
                const selectedIndex = languageSelect.selectedIndex;
                const link = `${languageSelect.querySelectorAll('option')[selectedIndex].getAttribute('link')}?post_lang=${languageSelect.value}`;
                window.location.replace(link);
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

        passDataToModal();
        changeLanguagePost();
    </script>
@endsection
