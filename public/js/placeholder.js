window.addEventListener('DOMContentLoaded', ready)

function loadPlaceHolder(element) {
    element.src = element.getAttribute('data-src');
    element.addEventListener('load', () => {
        element.classList.remove('placeholder');
        element.removeAttribute('data-src');
    })
}

function ready() {
    const elements = document.querySelectorAll('.placeholder');
    elements.forEach(element => {
        loadPlaceHolder(element);
    });
}
