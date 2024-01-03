(function () {
    const renderTimeLine = () => {
        const timeline = document.querySelector('.timeline');
        const timelineItems = timeline.querySelectorAll('.timeline-item');
        const timelineRow = document.createElement('div');
        const timelineRay = document.createElement('div');

        timelineRay.style.width = '4px';
        timelineRay.style.padding = '0';
        timelineRay.style.height = '100%';
        timelineRay.style.backgroundColor = '#DDD';
        timelineRay.style.alignSelf = 'center';
        timelineRay.style.position = 'absolute';
        timelineRay.classList.add('d-md-block', 'd-none');

        timelineRow.classList.add('row', 'flex-column');
        timelineRow.style.position = 'relative';

        const htmls = Array.from(timelineItems).map(item => {
            const color = item.getAttribute('color');
            const subColor = item.getAttribute('sub-color') ? item.getAttribute('sub-color') : color;
            const year = item.getAttribute('year');
            const direction = item.getAttribute('direction');
            const content = item.innerText;

            const timelineItem = document.createElement('div');
            const timelineYear = document.createElement('div');
            const timelineContent = document.createElement('div');
            const triangle = document.createElement('div');
            const square = document.createElement('div');

            timelineYear.style.position = 'relative';
            timelineYear.style.borderRadius = '0px 40px 40px 0px';

            timelineItem.classList.add('col-md-4', 'col-10')

            triangle.style.position = 'absolute';
            triangle.style.width = '0';
            triangle.style.height = '0';
            triangle.style.borderLeft = '20px solid transparent';
            triangle.style.borderRight = '20px solid transparent';
            triangle.style.borderTop = `20px solid ${subColor}`;
            triangle.style.transform = 'rotate(-135deg)';
            triangle.style.left = '-27px';

            square.style.position = 'absolute';
            square.style.backgroundColor = color;
            square.style.width = '31px';
            square.style.height = '34px';
            square.style.left = '-29px';
            square.style.top = '0';

            if (direction === 'left') {
                if(window.screen.width > 748) {
                    timelineItem.style.alignSelf = 'start';
                    timelineItem.style.marginLeft = '100px' ;
                } else {
                    timelineItem.style.alignSelf = 'center';
                    timelineItem.style.marginTop = '20px' ;
                }

            } else {
                if(window.screen.width > 748) {
                    timelineItem.style.alignSelf = 'end';
                    timelineItem.style.marginRight = '100px' ;
                } else {
                    timelineItem.style.alignSelf = 'center';
                    timelineItem.style.marginTop = '20px' ;
                }
            }

            timelineItem.classList.add('timeline-item');
            timelineYear.classList.add('timeline-year');
            timelineContent.classList.add('timeline-content', 'shadow');

            timelineYear.innerText = year;
            timelineYear.style.backgroundColor = color;
            timelineContent.innerText = content;

            timelineYear.appendChild(triangle);
            timelineYear.appendChild(square);

            timelineItem.appendChild(timelineYear);
            timelineItem.appendChild(timelineContent);
            timelineItem.setAttribute('color', color);



            return timelineItem.outerHTML;
        });

        timelineRow.innerHTML = htmls.join('');
        timeline.innerHTML = timelineRow.outerHTML;
        
        const handledItems = document.querySelectorAll('.timeline-item');
        Array.from(handledItems).forEach(item => {
            const color = item.getAttribute('color');
            const circle = document.createElement('div');
            circle.style.position = 'absolute';
            circle.style.padding = '7px';
            circle.style.transform = 'translateX(calc(-50% + 2px))';
            circle.style.borderRadius = '50%';
            circle.style.border = `5px solid ${color}`;
            circle.style.top = `${item.offsetTop}px`;
            circle.style.backgroundColor = '#FFF';
            
            timelineRay.appendChild(circle);
        });

        timelineRow.appendChild(timelineRay);
        timeline.innerHTML = timelineRow.outerHTML;
    }

    renderTimeLine();
})();