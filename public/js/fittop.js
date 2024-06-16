function fitTop(subMenuSelector, subItemsSelector) {
    const subItems = document.querySelectorAll(subItemsSelector);
    subItems.forEach(item => {
        item.onmouseover = () => {
            const subMenu = item.querySelector(subMenuSelector);
            const top = item.offsetTop;
            subMenu.style.top = `${top}px`;
        }
    });

}