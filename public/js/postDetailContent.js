const app = {

    links: null,
    popupElement: document.querySelector('.popup'),

    detailLinksClickHandler: function() {
        Array.from(this.links).forEach(link => {
            link.onclick = e => {
                e.preventDefault();
                const url = e.target.href;
                this.showPopup();
                const popupConfirmBtn = this.popupElement.querySelector('.popup-submit-button');
                popupConfirmBtn.onclick = () => {
                    window.location.replace(url);
                }
            }
        })
    },

    showPopup: function() {
        this.popupElement.classList.add('show');
    },

    initializeElements: function() {
        this.links = document.querySelectorAll('.post-detail_content a');
    },

    handleEvents: function() {
        this.detailLinksClickHandler();
    },

    start: function() {
        this.initializeElements();
        this.handleEvents();
    }
}

app.start();