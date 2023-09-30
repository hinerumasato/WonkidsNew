(function() {
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