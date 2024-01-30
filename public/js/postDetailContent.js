import { Toast } from "./Toast.js";

const app = {

    links: null,
    popupElement: document.querySelector('.popup'),

    detailLinksClickHandler: function() {
        Array.from(this.links).forEach(link => {
            link.onclick = e => {
                e.preventDefault();
                if(localStorage.getItem('token') == null)  {
                    const url = "/client/login";
                    this.showPopup();
                    const popupConfirmBtn = this.popupElement.querySelector('.popup-submit-button');
                    popupConfirmBtn.onclick = () => {
                        window.location.replace(url);
                    }
                } else {
                    const href = link.href;
                    const apiUrl = "/api/v1/user";
                    const token = localStorage.getItem('token');
                    const headres = new Headers();
                    headres.append('Authorization', `Bearer ${token}`);
                    fetch(apiUrl, {
                        method: 'GET',
                        headers: headres,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.statusCode === 200)
                            window.location.replace(href);
                        else throw new Error('Token đã hết hạn, vui lòng đăng nhập lại');
                    }).catch(error => {
                        const toast = new Toast(error.message, 'error');
                        toast.show();
                        localStorage.removeItem('token');
                        setTimeout(() => {
                            window.location.replace('/client/login');
                        }, 1000);
                    });
                }
            }
        })
    },

    showPopup: function() {
        this.popupElement.classList.add('show');
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
}

app.start();