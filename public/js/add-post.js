function postFile() {
    const fileInput = document.querySelector('.file-post-input');
    const imgBlock = document.querySelector('.upload-post-info-imgs');
    const imgSrcInput = document.querySelector('.img-src');
    const postAddForm = document.getElementById('post-add-form');
    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const img = document.createElement('img');
        const reader = new FileReader();

        reader.onload = async e => {
            const contents = e.target.result;
            const fileQuantity = document.querySelector('.file-quantity');
            const response = await fetch(uploadImageLink, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
    
                body: JSON.stringify({
                    fileName: file.name,
                    contents: contents,
                }),
            });
            const responseData = await response.json();
            console.log(responseData.decode);
            img.src = responseData.src;
            fileQuantity.textContent = responseData.fileQuantity + " ảnh đã đính kèm";
            
            const imgWrap = document.createElement('div');
            const checkbox = document.createElement('input')
            imgWrap.classList.add('upload-post-info-wrap');
            checkbox.setAttribute('type', 'checkbox');

            
            img.classList.add('upload-post-info-img');
            imgWrap.appendChild(img);
            imgWrap.appendChild(checkbox);
            imgBlock.appendChild(imgWrap);
            const input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'imgSrc[]');
            input.value = responseData.link;
            postAddForm.appendChild(input);
            
        }
        reader.readAsDataURL(file);

    });
}

postFile();