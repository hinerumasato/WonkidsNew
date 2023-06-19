<div class="upload-post border">

    <div class="upload-post_header p-3 d-flex justify-content-start align-items-center">
        <button class="border border-none shadow bg-white rounded px-3" type="button"
            onclick="document.querySelector('.file-post-input').click()">
            <i class="fa-solid fa-paperclip"></i>
            Đính kèm
        </button>
        <small class="ms-2" style="cursor: pointer" onclick="document.querySelector('.file-post-input').click()">
            Bấm vào đây để đính kèm file
        </small>
    </div>
    <input type="file" name="file" id="" multiple class="d-none file-post-input">

    <div class="upload-post-info">
        <div class="d-flex justify-content-end">
            <div class="file-action-btn" onclick="insertToPost();">Chèn vào bài viết</div>
            <div class="file-action-btn" onclick="deleteUploaded();">Xoá file đã chọn</div>
        </div>

        <div class="upload-post-info-imgs d-flex">
            @foreach ($imgLinks as $link)
                <div class="upload-post-info-wrap">
                    <img src="{{ $link }}" alt="" class="upload-post-info-img">
                    <input type="checkbox" name="" id="">
                </div>
            @endforeach
        </div>
    </div>
</div>
