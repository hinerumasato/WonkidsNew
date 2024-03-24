(function() {
    const renderAuthHeader = () => {
        const authHeaders = document.querySelectorAll('.auth-header');
        const locale = document.querySelector('html').getAttribute('lang');
        const language = new Language(locale);
        const token = localStorage.getItem('token');
        const headres = new Headers();
        headres.append('Authorization', `Bearer ${token}`);
        fetch('/api/v1/user', {
            method: 'GET',
            headers: headres,
        })
        .then(response => response.json())
        .then(data => {
            if(data.statusCode == 200) {
                authHeaders.forEach(authHeader => {
                    authHeader.innerHTML += /* html */ `
                    <div class="d-flex align-items-center"></div>
                    <div class="wrapper text-center fw-bold">
                        <div>Xin chào ${data.data.name}</div>
                        <button class="btn-main px-3 py-1 border-0 rounded logout-btn mt-1">Đăng xuất</button>
                    </div>
                    `
                })
            } else {
                authHeaders.forEach(authHeader => {
                    authHeader.innerHTML += /* html */ `
                    <div class="auth-btn-wrapper mt-2">
                        <a href="/client/login" class="btn-root">${language.trans('login')}</a>
                        <a href="/client/register" class="btn-main text-white px-3 py-2 rounded fw-bold">${language.trans('signup')}</a>
                    </div>
                `
                })
            }
        }).then(() => {
            const logoutBtn = document.querySelector('.logout-btn');
            if(logoutBtn) {
                logoutBtn.onclick = () => {
                    localStorage.removeItem('token');
                    
                    Toastify({
                        text: 'Đăng xuất thành công',
                        duration: 3000,
                        destination: "/client/login",
                        newWindow: false,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "center", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: `linear-gradient(to right, #2196F3, #1976D2)`,
                        },
                    }).showToast();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        })
    }

    renderAuthHeader();

    const closeAllList = () => {
        const navItems = document.querySelectorAll('.mobile-nav .nav-item');
        navItems.forEach(item => {
            const list = item.querySelector('ul');
            if(list !== null)
                list.classList.add('close');
        })
    }
    
    closeAllList();

    const openList = () => {
        const openBtns = document.querySelectorAll('.mobile-nav .open-btn');
        openBtns.forEach(btn => {
            btn.onclick = e => {
                const target = e.target;
                const icon = target.querySelector('i');
                const navItem = target.parentNode;
                const list = navItem.querySelector('ul');

                icon.classList.toggle('fa-rotate-90');
                if(icon.classList.contains('fa-rotate-90') && list !== null) {
                    list.classList.remove('close');
                } else {
                    list.classList.add('close');
                }

            }
        })
    }

    openList();

})();