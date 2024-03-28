(function () {
    const showHomePagePopup = function() {

        const showPopup = function(popup) {
            popup.classList.add('show');
        }

        const popup = document.querySelector('.popup');
        if(!sessionStorage.getItem("read-popup"))
            showPopup(popup);
    }

    const startSplide = function() {
        new Splide('#zoneCarousel', {
            perPage: 4,
            breakpoints: {
                990: {
                    perPage: 3,
                },
                640: {
                    perPage: 2,
                },
            },
        }).mount();
    }

    showHomePagePopup();
    startSplide();

})();