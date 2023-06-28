const preloader = document.querySelector('#preloader');

window.addEventListener('load', () => {
    setTimeout(() => {
        preloader.classList.add('disappear');
    }, 500);
});

