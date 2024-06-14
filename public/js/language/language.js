class Language {
    constructor(locale) {
        this.locale = locale;
        this.dataSource = {
            'vi': {
                'login': 'Đăng nhập',
                'signup': 'Đăng ký',
                'error': 'Đã có lỗi xảy ra, vui lòng xem lại thông tin',
                'emailNotEntered': 'Chưa nhập email',
                'emailNotValid': 'Email không hợp lệ',
                'passwordNotEntered': 'Chưa nhập mật khẩu',
                'birthyearNotEntered': 'Chưa nhập năm sinh',
                'notValidBirthyear': 'Năm sinh không hợp lệ',
                'birthyearMustnotContainSpecialCharacter': 'Năm sinh không được chứa ký tự đặc biệt',
                'phoneMustnotContainSpecialCharacter': 'Số điện thoại không được chứa ký tự đặc biệt',
                'nameNotEntered': 'Chưa nhập tên',
                'nameMustnotContainSpecialCharacter': 'Tên không được chứa ký tự đặc biệt',
                'passwordConfirmationNotEntered': 'Chưa nhập xác nhận mật khẩu',
                'passwordConfirmationNotMatch': 'Xác nhận mật khẩu không khớp',
                'churchNotEntered': 'Chưa nhập hội thánh',
                
            },
            'en': {
                'login': 'Log in',
                'signup': 'Sign up',
                'error': 'An error occurred, please check your information',
                'emailNotEntered': 'Email not entered',
                'emailNotValid': 'Email is not valid',
                'passwordNotEntered': 'Password not entered',
                'birthyearNotEntered': 'Birthyear not entered',
                'notValidBirthyear': 'Not valid birthyear',
                'birthyearMustnotContainSpecialCharacter': 'Birthyear must not contain special character',
                'phoneMustnotContainSpecialCharacter': 'Phone must not contain special character',
                'nameNotEntered': 'Name not entered',
                'nameMustnotContainSpecialCharacter': 'Name must not contain special character',
                'passwordConfirmationNotEntered': 'Password confirmation not entered',
                'passwordConfirmationNotMatch': 'Password confirmation not match',
                'churchNotEntered': 'Church not entered',
            },
            'ko': {
                'login': '로그인',
                'signup': '회원가입',
                'error': '오류가 발생했습니다. 정보를 확인하십시오',
                'emailNotEntered': '이메일을 입력하지 않았습니다',
                'emailNotValid': '유효하지 않은 이메일',
                'passwordNotEntered': '비밀번호를 입력하지 않았습니다',
                'birthyearNotEntered': '출생년도를 입력하지 않았습니다',
                'notValidBirthyear': '유효하지 않은 출생년도',
                'birthyearMustnotContainSpecialCharacter': '출생년도에는 특수 문자를 포함할 수 없습니다',
                'phoneMustnotContainSpecialCharacter': '전화번호에는 특수 문자를 포함할 수 없습니다',
                'nameNotEntered': '이름을 입력하지 않았습니다',
                'nameMustnotContainSpecialCharacter': '이름에는 특수 문자를 포함할 수 없습니다',
                'passwordConfirmationNotEntered': '비밀번호 확인을 입력하지 않았습니다',
                'passwordConfirmationNotMatch': '비밀번호 확인이 일치하지 않습니다',
                'churchNotEntered': '교회를 입력하지 않았습니다',
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