export class Toast {
    constructor(message, type) {
        this.message = message;
        this.type = type;
    }

    /**
     * @returns {String} style of background
     */
    getBackground() {
        switch (this.type) {
            case 'error':
                return "linear-gradient(to right, #EA2F2F, #FF8A8A)";
            case 'success':
                return "linear-gradient(to right, #4CAF50, #45a049)";
            default:
                return "linear-gradient(to right, #2196F3, #1976D2)";
        }
    }

    show() {
        Toastify({
            text: this.message,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: this.getBackground(),
            },
            onClick: function () { } // Callback after click
        }).showToast();
    }
}