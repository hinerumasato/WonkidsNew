const state = window.location.href === addPostLink ? 'add' : 'edit';

function imageUploadHandler(blobInfo) {
    return new Promise(async (resolve, reject) => {
        const formData = new FormData();
        const uploadLink = state === 'add' ? uploadStagingAreaLink : uploadImgLink;
        formData.append('file', await blobInfo.blob(), blobInfo.filename());

        if(state === 'edit') {
            const currentLink = window.location.href;
            const language_id = currentLink.split('/')[currentLink.split('/').length - 1]; 
            const post_id = currentLink.split('/')[currentLink.split('/').length - 2];
            formData.append('language_id', language_id);
            formData.append('post_id', post_id);
        }

        const api = await fetch(uploadLink, {
            method: 'POST',
            body: formData,
        });

        const json = await api.json();

        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ');
            return;
        }

        appendLocation(json.location);
        resolve(json.location);

    });
}

async function imageDeleteOneHandler(location) {
    let deleteLink = deleteStagingAreaLink + `/?location=${location}`;
    if(state == 'edit') {
        const currentLink = window.location.href;
        const language_id = currentLink.split('/')[currentLink.split('/').length - 1]; 
        const post_id = currentLink.split('/')[currentLink.split('/').length - 2];
        deleteLink = deleteImgLink + `/?location=${location}&language_id=${language_id}&post_id=${post_id}`;
    }
    const response = await fetch(deleteLink, {
        method: 'DELETE',
    });
    return await response.json();
}


function appendLocation(location) {
    const postImgs = document.querySelector('.upload-post-info-imgs');
    const wrap = document.createElement('div')
    const img = document.createElement('img');
    const checkbox = document.createElement('input');

    img.src = location;
    img.className = 'upload-post-info-img';
    checkbox.type = 'checkbox';
    wrap.className = 'upload-post-info-wrap';
    wrap.appendChild(img);
    wrap.appendChild(checkbox);
    postImgs.appendChild(wrap);
    postImgListener();

}

function fileListener(fileSelector) {
    const fileInput = document.querySelector(fileSelector);
    fileInput.onchange = e => {
        const file = e.target.files[0];
        const myBlobInfo = new MyBlobInfo(file);
        imageUploadHandler(myBlobInfo);
    }
}

function postImgListener() {
    const postImgs = document.querySelectorAll('.upload-post-info-img');
    postImgs.forEach(img => {
        img.onclick = () => {
            const checkbox = img.parentNode.querySelector('input');
            checkbox.checked = !checkbox.checked;
        }
    })
}

function insertToPost() {
    const checkboxs = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxs.forEach(checkbox => {
        const selectedImg = checkbox.parentNode.querySelector('img');
        const editor = tinymce.get('crudArea');
        console.log(editor);
        editor.focus();
        editor.execCommand('mceInsertContent', false, `<p> ${selectedImg.outerHTML} </p>`);
    });
}

function deleteUploaded() {
    const checkboxs = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxs.forEach(async checkbox => {
        const selectedImg = checkbox.parentNode.querySelector('img');
        const location = selectedImg.src;
        const result = await imageDeleteOneHandler(location);
        console.log(result);
        if(result.message == 'success') {
            const wrap = selectedImg.parentNode;
            wrap.outerHTML = '';
        }

        else {
            alert(result.message);
        }
    });
}

postImgListener();
fileListener('.file-post-input');