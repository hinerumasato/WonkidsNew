class Language {
    constructor(locale) {
        this.locale = locale;
        this.dataSource = {
            'vi': {
                'login': 'Đăng nhập',
                'signup': 'Đăng ký',
            },
            'en': {
                'login': 'Log in',
                'signup': 'Sign up',
            },
            'ko': {
                'login': '로그인',
                'signup': '회원가입',
            }
        }
    }

    /**
     * 
     * @param {String} key 
     * @returns {String} translated string
     */
    trans(key) {
        return this.dataSource[this.locale][key];
    }
}