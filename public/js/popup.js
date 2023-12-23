const popup = {

    popupElement: document.querySelector('.popup'),

    addShadowOnPopup: function() {
        const inner = this.popupElement.querySelector('.popup-inner')
        inner.classList.add('shadow');
    },

    hidePopupListener: function () {
        const cancelButton = this.popupElement.querySelector('.popup-cancel-button');
        const okButton = this.popupElement.querySelector('.popup-ok-button');
        
        if(cancelButton) {
            cancelButton.onclick = () => {
                this.popupElement.classList.remove('show');
            }
        }

        if(okButton) {
            okButton.onclick = () => {
                this.popupElement.classList.remove('show');
                sessionStorage.setItem("read-popup", "read");
            }
        }

    },
    
    handleEvents: function() {
        this.addShadowOnPopup();
        this.hidePopupListener();
    },
    
    start: function() {
        this.handleEvents();
    }
}.start();