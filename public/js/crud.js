const state = window.location.href.split('?')[0] === addPostLink ? 'add' : 'edit';

function isImageFile(extension) {
    return extension === 'jpg' || 
           extension === 'png' || 
           extension === 'jepg' ||
           extension === 'gif' ||
           extension === 'bmp';
}

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

        if(isImageFile(json.extension))
            appendImgLocation(json.location);
        else {
            appendOtherFileLocation(json);
        }

        if(blobInfo instanceof MyBlobInfo)
            insertToPostDuringUpload(json);
        resolve(json.location);
    });
}

function onSubmitHandler() {
    const form = document.querySelector('form[method="POST"]');
    form.onsubmit = async e => {
        e.preventDefault();
        const formData = new FormData();
        const editor = tinymce.get('crudArea');
        const elements = editor.dom.select('*[media]');
        elements.forEach(element => {
            const mediaId = editor.dom.getAttrib(element, 'media');
            if(!formData.has(mediaId))
                formData.append(mediaId, `<p>${element.outerHTML}</p>`);
            else {
                const oldData = formData.get(mediaId);
                formData.set(mediaId, oldData + `<p>${element.outerHTML}</p>`);
            }
        });

        if(state === 'add') {
            await fetch(uploadMediaStagingAreaLink, {
                method: 'POST',
                body: formData,
            });
            form.submit();
        }

        else {
            const currentLink = window.location.href;
            const language_id = currentLink.split('/')[currentLink.split('/').length - 1]; 
            const post_id = currentLink.split('/')[currentLink.split('/').length - 2];
            formData.append('language_id', language_id);
            formData.append('post_id', post_id);
            const api = await fetch(uploadMediaLink, {
                method: 'POST',
                body: formData,
            });
            form.submit();
        }
        
    }
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

    deleteFromPost(location);

    return await response.json();
}

function deleteFromPost(location) {
    const editor = tinymce.get('crudArea');
    const elements = editor.dom.select(`img[src="${location}"],a[href="${location}"]`);
    elements.forEach(element => {
        editor.dom.remove(element);
    });
}


function appendImgLocation(location) {
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

function appendOtherFileLocation(json) {
    const postOthers = document.querySelector('.upload-post-info-others');
    const wrap = document.createElement('div');
    const anchor = document.createElement('a');
    const checkbox = document.createElement('input');

    anchor.href = json.location;
    anchor.className = 'upload-post-info-link';
    anchor.innerText = json.name;
    checkbox.type = 'checkbox';
    wrap.className = 'upload-post-info-wrap';
    wrap.appendChild(anchor);
    wrap.appendChild(checkbox);
    postOthers.appendChild(wrap);
    postOtherListener();
}

function fileListener(fileSelector) {
    const fileInput = document.querySelector(fileSelector);
    fileInput.onchange = e => {
        const files = Array.from(e.target.files);
        files.forEach(file => {
            const myBlobInfo = new MyBlobInfo(file);
            imageUploadHandler(myBlobInfo);
        })
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

function postOtherListener() {
    const files = document.querySelectorAll('.upload-post-info-others .upload-post-info-link');
    files.forEach(file => {
        file.onclick = () => {
            const checkbox = file.parentNode.querySelector('input');
            checkbox.checked = !checkbox.checked;
        }
    })
}


function insertToPostDuringUpload(file) {

    const location = file.location;
    const editor = tinymce.get('crudArea');
    const wrap = editor.dom.create('p');

    if(isImageFile(file.extension)) {
        const newImg = editor.dom.create('img', {
            'src': location,
            'class': 'upload-post-info-img',
        });
        wrap.appendChild(newImg);
    }

    else {
        const newLink = editor.dom.create('a', {
            'href': location,
            'class': 'upload-post-info-link',
        });
        wrap.appendChild(newLink);
    }
    editor.dom.add(editor.selection.getNode(), wrap);
}

function insertToPost() {
    const checkboxs = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxs.forEach(checkbox => {
        const selectedImg = checkbox.parentNode.querySelector('img');
        const selectedOtherFile = checkbox.parentNode.querySelector('a');
        const outerHTML = selectedImg ? selectedImg.outerHTML : selectedOtherFile.outerHTML;
        
        const editor = tinymce.get('crudArea');
        editor.focus();
        editor.execCommand('mceInsertContent', false, `<p> ${outerHTML} </p>`);
    });
}

function deleteUploaded() {
    const checkboxs = document.querySelectorAll('input[type="checkbox"]:checked');
    checkboxs.forEach(async checkbox => {
        const selectedImg = checkbox.parentNode.querySelector('img');
        const selectedOtherFile = checkbox.parentNode.querySelector('a');
        const location = selectedImg ? selectedImg.src : selectedOtherFile.href;

        const result = await imageDeleteOneHandler(location);
        
        if(result.message == 'success') {
            const wrap = selectedImg ? selectedImg.parentNode : selectedOtherFile.parentNode;
            wrap.outerHTML = '';
        }

        else {
            alert(result.message);
        }
    });
}

function fileHandler() {
    document.querySelector('.file-post-input').click();
}

postImgListener();
fileListener('.file-post-input');
onSubmitHandler();
postOtherListener();