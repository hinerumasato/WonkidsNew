(function () {

    const getBreakPoints = () => {
        const viewport = window.screen.width;
        const breakpoints = {
            "xl": 1200,
            "lg": 992,
            "md": 768,
            "sm": 576,
        }

        if(viewport < breakpoints['sm'])
            return 'sm';
        if(viewport < breakpoints['md'])
            return 'md';
        if(viewport < breakpoints['lg'])
            return 'lg';
        if(viewport < breakpoints['xl'])
            return 'xl';
        return 'xl';
    }

    const getCol = (breakpoints, breakpointsItem) => {
        const breakpointsArr = breakpointsItem.split(" ");
        let result = 3;
        breakpointsArr.forEach(breakpoint => {
            const breakpointData = breakpoint.split("-");
            if(breakpoints === breakpointData[0]) {
                result = parseInt(breakpointData[1]);
            }
        });
        return result;
    } 

    const cardSlider = () => {
        const zonesWrapper = document.querySelector('.zones-wrapper');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const zonesItems = document.querySelectorAll('.zones-item');

        const breakpoints = getBreakPoints();
        const breakpointsItem = zonesWrapper.getAttribute('item');
        const col = getCol(breakpoints, breakpointsItem);

        const width = (zonesWrapper.offsetWidth) / col - 24;
        const marginRight = (zonesWrapper.offsetWidth - col * width) / col;
        
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