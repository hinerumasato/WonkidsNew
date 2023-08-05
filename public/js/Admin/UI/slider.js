const app = {

    sliderImgs: [],
    fileInput: [],
    addSliderBtn: [],
    deleteIcon: '',
    rowColsNum: 0,
    rowColsClass: '',
    sliderWrap: [],
    sliderIconWraps: [],
    heightRatio: 70, //Percent Unit
    modalBtn: document.querySelector('.modal-btn'),
    
    initialization: function() {
        this.sliderWrap = document.querySelector('.slider-img-wrap');
        this.sliderIconWraps = document.querySelectorAll('.slider-icon-wrap');
        this.rowColsClass = 'row-cols-',
        this.sliderImgs = document.querySelectorAll('.slider-img');
        this.setRowColsNum(this.sliderImgs.length);
        this.fileInput = document.querySelector('.slider-input');
        this.addSliderBtn = document.querySelector('.add-slider-btn');
        this.deleteIcon = '<i class="fa-solid fa-trash trash-icon"></i>';
    },

    reinitialization: function() {
        this.sliderImgs = document.querySelectorAll('.slider-img');
        this.sliderIconWraps = document.querySelectorAll('.slider-icon-wrap');
        this.handleEvents();
    },

    setSliderIconWrapHeight: function() {
        if(this.sliderImgs.length > 0) {
            const img = this.sliderImgs[0];
            const height = img.offsetWidth / 100 * this.heightRatio;
            this.sliderIconWraps.forEach(wrap => {
                wrap.style.height = `${height}px`;
            });
        }
    },

    setRowColsNum: function(num) {
        if(num <= 5)
            this.rowColsNum = num;
        else this.rowColsNum = 5;
    },

    getRowColsClass: function() {
        return this.rowColsClass + this.rowColsNum;
    },

    openFileExplorer: function() {
        this.fileInput.click();
        this.readFile(this.fileInput);
    },

    addNewSlider: async function (blobInfo) {
        const formData = new FormData();
        formData.append('file', await blobInfo.blob(), blobInfo.name);
    
        const api = await fetch(uploadSliderLink, {
            method: 'POST',
            body: formData,
        });
        
        const json = await api.json();

        const alert = document.querySelector('.alert');
        console.log(alert);
        if(alert) {
            alert.remove();
        }
        await this.appendToSliderWrap(json.link);
    },

    readFile: function(fileInput) {
        fileInput.onchange = e => {
            const files = Array.from(e.target.files);
            files.forEach(async file => {
                const blobInfo = new MyBlobInfo(file);
                await this.addNewSlider(blobInfo);
            });
        }
    },

    setRowColsClass: function() {
        let rowColsClass = this.getRowColsClass();
        this.sliderWrap.classList.add(rowColsClass);
    },

    setNewRowColsClass: function() {
        let rowColsClass = this.getRowColsClass();
        if(this.sliderWrap.classList.contains(rowColsClass))
            this.sliderWrap.classList.remove(rowColsClass);

        this.setRowColsNum(this.rowColsNum + 1);
        rowColsClass = this.getRowColsClass();
        this.sliderWrap.classList.add(rowColsClass);
    },

    setPseudoSliderIconWidth: function() {
        const img = this.sliderImgs[0];
        const pseudoSliderIcon = document.querySelectorAll('.pseudo-slider-icon');
        pseudoSliderIcon.forEach(element => {
            element.style.width = `${img.offsetWidth}px`;
        });
    },

    appendToSliderWrap: async function(link) {
        
        const sliderIconWrap = document.createElement('div');
        const pseudo = document.createElement('div');
        const img = document.createElement('img');

        sliderIconWrap.classList.add('col', 'slider-icon-wrap');
        pseudo.classList.add('pseudo-slider-icon');

        img.classList.add('slider-img', 'w-100', 'h-100');
        img.src = link;

        sliderIconWrap.innerHTML += pseudo.outerHTML + img.outerHTML + this.deleteIcon;
        
        this.setNewRowColsClass();
        this.sliderWrap.appendChild(sliderIconWrap);
        this.reinitialization();
        this.setPseudoSliderIconWidth();
        this.setSliderIconWrapHeight();
    },

    deleteSlider: async function(img) {
        const response = await fetch(`${deleteSliderLink}/?link=${img.src}`, {
            method: 'DELETE',
        });

        window.location.reload();
    },

    handleEvents: function() {
        this.addSliderBtn.onclick = () => {
            this.openFileExplorer();
        }

        if(this.sliderIconWraps.length > 0) {
            this.sliderIconWraps.forEach(wrap => {
                wrap.onclick = () => {
                    const img = wrap.querySelector('img');
                    const deleteBtn = document.querySelector('.slider-delete-btn');
                    this.modalBtn.click();
                    deleteBtn.onclick = async () => {
                        await this.deleteSlider(img);                  
                    }
                };
            })
        }
    },

    start: function() {
        this.initialization();
        this.setRowColsClass();
        this.setPseudoSliderIconWidth();
        this.setSliderIconWrapHeight();
        this.handleEvents();
    },

}.start();
