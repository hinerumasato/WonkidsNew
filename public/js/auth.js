class Authentication {
    constructor() {
        this.email = document.querySelector('input[type="email"]');
        this.password = document.querySelector('input[type="password"]');
        this.sumbitBtn = document.querySelector('button[type="submit"]');
        this.locale = document.querySelector('html').getAttribute('lang');
    }

    successField(field) {
        return {
            'field': field,
            'icon': `<i class="fa-solid fa-check"></i>`,
            'message': 'OK',
            'type': true,
        };
    }

    /**
     * @param {HTMLInputElement} field 
     * @param {string} message error message
     */
    errorField(field, message) {
        return {
            'field': field,
            'icon': `<i class="fa-solid fa-xmark"></i>`,
            'message': message,
            'type': false,
        }
    }

    removeAlertAndTick() {
        const alerts = document.querySelectorAll('div.alert');
        alerts.forEach(item => item.remove());
        const ticks = document.querySelectorAll('.tick-icon');
        ticks.forEach(tick => tick.remove());
    }

    registerSubmitHandler() {
        this.email = document.querySelector('input[type="email"]');
        this.password = document.querySelector('input[type="password"]');
        const name = document.getElementById('registerName');
        const phone = document.getElementById('registerPhone');
        const church = document.getElementById('registerChurch');
        const birthYear = document.getElementById('registerBirthYear');
        const passwordConfirmation = document.getElementById('registerPasswordConfirmation');

        const validation = this.validate([
            this.isEmail(),
            this.isPassword(),
            this.isName(name),
            this.isMatchPassword(passwordConfirmation),
            this.isBirthYear(birthYear),
            this.isPhone(phone),
            this.isChurch(church),
        ]);

        if (validation) {
            const formData = new FormData();
            formData.append('email', this.email.value);
            formData.append('password', this.password.value);
            formData.append('name', name.value);
            formData.append('birthYear', birthYear.value);
            formData.append('phone', phone.value);
            formData.append('church', church.value);
            formData.append('client_locale', this.locale);


            const url = '/api/v1/register';
            fetch(url, {
                method: 'POST',
                body: formData,
            }).then(response => {
                return response.json();
            }).then(data => {
                if (data.statusCode === 422)
                    throw { message: data.message, data: data.data };
                else {
                    const message = data.message;
                    this.toast(message, 'success');
                    setTimeout(() => {
                        window.location.replace('/client/login');
                    }, 1000)
                }
            }).catch(error => {
                const errorData = error.data;
                if (errorData.email) {
                    const message = errorData.email[0]; // Get error message in array
                    this.toast(message, 'error');
                    this.removeAlertAndTick();
                }

            })
        } else {
            this.errorHandler();
        }
    }

    loginSubmitHandler() {
        this.email = document.querySelector('input[type="email"]');
        this.password = document.querySelector('input[type="password"]');
        const validation = this.validate([
            this.isEmail(),
            this.isPassword(),
        ]);

        if (validation) {
            const formData = new FormData();
            const email = this.email.value;
            const password = this.password.value;
            const url = '/api/v1/login';
            formData.append('email', email);
            formData.append('password', password);
            fetch(url, {
                method: 'POST',
                body: formData,
            }).then(response => {
                return response.json();
            }).then(data => {
                if(data.statusCode === 404)
                    throw {message: data.message}
                else {
                    const token = data.token;
                    localStorage.setItem('token', token);
                    this.toast(data.message, 'success');
                    setTimeout(() => {
                        window.location.replace('/');
                    }, 1000);
                }
            }).catch(error => {
                const errorMessage = error.message;
                this.toast(errorMessage, 'error');
                this.removeAlertAndTick();
            })
        } else {
            this.toast('Đã có lỗi xảy ra, vui lòng xem lại thông tin', 'error');
            const card = document.querySelector('.card');
            card.scrollIntoView({ behavior: 'smooth' });
        }
    }

    /**
     * Toast notification
     * @param {string} message 
     */
    toast(message, type = '') {
        let background = "linear-gradient(to right, #EA2F2F, #FF8A8A)";
        switch (type) {
            case 'error':
                background = "linear-gradient(to right, #EA2F2F, #FF8A8A)";
                break;
            case 'success':
                background = "linear-gradient(to right, #4CAF50, #45a049)";
                break;
            default:
                background = "linear-gradient(to right, #2196F3, #1976D2)";
                break;
        }
        Toastify({
            text: message,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: background,
            },
            onClick: function () { } // Callback after click
        }).showToast();
    }

    errorHandler() {
        Toastify({
            text: "Đã có lỗi xảy ra, vui lòng xem lại thông tin",
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #EA2F2F, #FF8A8A)",
            },
            onClick: function () { } // Callback after click
        }).showToast();

        const card = document.querySelector('.card');
        card.scrollIntoView({ behavior: 'smooth' });
    }

    isNumber(str) {
        if (!str) return false;
        const regex = /^[0-9]+$/;
        return regex.test(str);
    }

    /**
     * 
     * @returns {object}
     * @see successField
     * @see errorField
     */

    isEmail() {
        if (!this.email.value) return this.errorField(this.email, 'Chưa nhập email');
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/
        if (regex.test(this.email.value))
            return this.successField(this.email);
        return this.errorField(this.email, 'Email không hợp lệ')
    }

    isPassword() {
        if (!this.password.value) return this.errorField(this.password, 'Chưa nhập password');
        return this.successField(this.password);
    }

    /**
     * 
     * @param {HTMLInputElement} birthYear 
     * @returns {object}
     * @see successField
     * @see errorField
     */
    isBirthYear(birthYear) {
        if (!birthYear.value) return this.errorField(birthYear, 'Chưa nhập năm sinh');
        const str = birthYear.value;
        if (this.isNumber(str)) {
            const year = parseInt(str);
            if (year >= 1900 && year <= new Date().getFullYear()) {
                return this.successField(birthYear);
            } else return this.errorField(birthYear, 'Năm sinh không hợp lệ');
        } else return this.errorField(birthYear, 'Năm sinh không được chứa ký tự đặc biệt');
    }

    /**
     * 
     * @param {HTMLInputElement} phone 
     * @return {object}
     */
    isPhone(phone) {
        if (!phone.value) return this.successField(phone);
        if (this.isNumber(phone.value))
            return this.successField(phone);
        return this.errorField(phone, 'SĐT không chưa ký tự đặc biệt');
    }

    /**
     * @param {HTMLInputElement} name 
     * @returns {object}
     * @see successField
     * @see errorField
     */
    isName(name) {
        if (!name.value) return this.errorField(name, 'Chưa nhập tên');
        const value = name.value;
        const regex = /^[^\p{P}\p{S}\p{N}]+$/u;
        if (regex.test(value))
            return this.successField(name);
        else return this.errorField(name, 'Tên không được chứa ký tự đặc biệt')
    }

    /**
     * 
     * @param {HTMLInputElement} passwordConfirmation
     * @returns {object}
     * @see successField
     * @see errorField
     */
    isMatchPassword(passwordConfirmation) {
        if (!passwordConfirmation.value)
            return this.errorField(passwordConfirmation, 'Chưa nhập lại password');
        const passwordValue = this.password.value;
        const confirmationValue = passwordConfirmation.value;
        if (passwordValue === confirmationValue)
            return this.successField(passwordConfirmation);
        return this.errorField(passwordConfirmation, 'Nhập lại password chưa khớp')
    }

    /**
     * 
     * @param {HTMLInputElement} church
     * @returns {object}
     * @see successField
     * @see errorField
     */
    isChurch(church) {
        if (!church.value) return this.errorField(church, 'Chưa nhập hội thánh');
        return this.successField(church);
    }

    /**
     * 
     * @param {Array} rules array of rules
     * @returns {boolean} true if all of rules are valid
     */
    validate(rules) {
        rules.forEach(rule => {
            this.printRuleMessage(rule);
        });
        return rules.reduce((condition, rule) => condition && rule.type, true);
    }

    /**
     * Create label and putting it into DOM to notify to user about the state of validation
     * @param {object} rule 
     * @returns {void}
     */
    printRuleMessage(rule) {
        if (rule.type === false) {
            const alertType = `alert-danger`;
            const alert = `
                <div class="alert ${alertType} mt-3" role="alert">
                    ${rule.icon}
                    ${rule.message}
                </div>
            `;
            const inputField = rule.field;
            inputField.parentNode.insertAdjacentHTML('beforeend', alert);
        } else {
            rule.field.style.position = 'relative';
            const tick = document.createElement('div');
            tick.innerHTML = `<i class="fa-solid fa-check text-white"></i>`;
            tick.classList.add('tick-icon', 'valid');
            const inputField = rule.field;
            inputField.parentNode.insertAdjacentHTML('beforeend', tick.outerHTML);
        }

    }

    register() {
        this.sumbitBtn.onclick = e => {
            e.preventDefault();
            this.removeAlertAndTick();
            this.registerSubmitHandler();
        }
    }

    login() {
        this.sumbitBtn.onclick = e => {
            e.preventDefault();
            this.removeAlertAndTick();
            this.loginSubmitHandler();
        }
    }
}

(() => {
    if (window.location.pathname === '/client/register') {
        new Authentication().register();
    }
    else if (window.location.pathname === '/client/login') {
        new Authentication().login();
    }

})();