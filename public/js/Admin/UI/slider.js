function openExplorer() {
    const fileInput = document.querySelector('.slider-input');
    fileInput.click();
    readFile(fileInput);
}

function readFile(fileInput) {
    fileInput.onchange = e => {
        const files = Array.from(e.target.files);
        files.forEach(async file => {
            const blobInfo = new MyBlobInfo(file);
            await addNewSlider(blobInfo);
        });
    }
}

async function addNewSlider(blobInfo) {
    const formData = new FormData();
    formData.append('file', await blobInfo.blob(), blobInfo.name);

    const api = await fetch(uploadSliderLink, {
        method: 'POST',
        body: formData,
    });
    
    const json = await api.json();
    await appendToSliderWrap(json.link);
}

async function appendToSliderWrap(link) {
    const sliderWrap = document.querySelector('.slider-img-wrap');
    const img = document.createElement('img');

    img.classList.add('slider-img');
    img.classList.add('col');
    img.src = link;

    sliderWrap.appendChild(img);
}