window.addEventListener('DOMContentLoaded', ready);
window.addEventListener('load', () => {
    const imgs = document.querySelectorAll('img[data-src]');
    imgs.forEach(img => {
        img.src = img.getAttribute('data-src');
        img.removeAttribute('data-src');
    });
})

function load(element) {
    element.setAttribute('lazy-element', 'loaded');
    if(element.hasAttribute('animation')) {
        const animationName = element.getAttribute('animation')
        element.classList.add('animate__animated', animationName);
    }
}

function ready() {
    if('IntersectionObserver' in window) {
        const lazyElements = document.querySelectorAll('[lazy-element]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    load(entry.target);
                }
            });
        });

        lazyElements.forEach(element => {
            observer.observe(element);
        });
    }
}