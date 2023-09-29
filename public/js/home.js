(function () {
    const cardSlider = () => {
        const zonesWrapper = document.querySelector('.zones-wrapper');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const zonesItems = document.querySelectorAll('.zones-item');

        const width = (zonesWrapper.offsetWidth) / 3 - 24;
        const marginRight = (zonesWrapper.offsetWidth - 3 * width) / 3;
        
        zonesItems.forEach((item, index) => {
            item.style.width = `${width}px`;
            item.style.marginRight = (index < zonesItems.length - 1) ? `${marginRight}px` : 0;
        });

        nextBtn.onclick = () => {
            const scrollDistace = width + marginRight;
            zonesWrapper.scrollLeft += scrollDistace;
        }

        prevBtn.onclick = () => {
            const scrollDistace = width + marginRight;
            zonesWrapper.scrollLeft -= scrollDistace;
        }
        
    }

    cardSlider();

})();