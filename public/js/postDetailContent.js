const app = {

    links: null,

    detailLinksClickHandler: function() {
        Array.from(this.links).forEach(link => {
            link.onclick = e => {
                e.preventDefault();
                const url = e.target.href;
                if(confirm("Từ ngày 1/1/2024 sẽ xác thực")) {
                    window.location.replace(url);
                }
            }
        })
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
}.start();