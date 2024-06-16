import { Toast } from './Toast.js';

(function () {
    const form = document.querySelector('#contactForm');

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

    const handleContactFormSubmit = async e => {
        e.preventDefault();
        const title = form.querySelector('input[name="title"]').value;
        const email = form.querySelector('input[name="email"]').value;
        const message = form.querySelector('textarea[name="message"]').value;

        const data = {
            title: title,
            email: email,
            message: message
        }
        const response = await fetch('/api/v1/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        if(response.ok) {
            const toast = new Toast('Message sent successfully', 'success');
            toast.show();
        } else {
            const toast = new Toast('Failed to send message', 'error');
            toast.show();
        }
    }

    form.addEventListener('submit', handleContactFormSubmit);

    showHomePagePopup();
    startSplide();

})();