function getChangeLocaleLink(link, locale) {
    const linkArr = link.split('/');
    const format = linkArr.reduce((acc, curr, index) => index < linkArr.length - 1 ? acc.concat('/').concat(curr) : acc.concat(`/${locale}`));
    return format;
}

function changeSelect() {
    let link = new URL(window.location.href);
    const params = new URLSearchParams();
    const languageSelect = document.querySelector('.language-select');
    const categorySelect = document.querySelector('.category-select');
    
    
    languageSelect.value = languageLocale;
    categorySelect.value = postCategoryId;

    const option = categorySelect.options[categorySelect.selectedIndex];
    option.textContent = option.getAttribute('categoryText');

    languageSelect.onchange = async () => {
        link = new URL(window.location.href);
        const selectedIndex = languageSelect.selectedIndex;
        params.append('post_lang', languageSelect.value);
        params.append('post_category', categorySelect.value);
        link.search = params.toString();
        window.location.replace(link.toString());
    }

    categorySelect.onchange = () => {
        link = new URL(window.location.href);
        const selectedIndex = categorySelect.selectedIndex;
        params.append('post_lang', languageSelect.value);
        params.append('post_category', categorySelect.value);
        link.search = params.toString();
        window.location.replace(link.toString());
    }
}

function passDataToModal() {
    const btnModals = document.querySelectorAll('.btn-modal');
    btnModals.forEach(btn => {
        btn.onclick = () => {
            const postId = btn.getAttribute("postid");
            const btnSubmit = document.querySelector('.btn-submit');
            let link = btnSubmit.getAttribute('link');
            let formatLink = link.slice(0, -1) + postId;
            const deleteForm = document.getElementById('deletePostForm');
            deleteForm.setAttribute("action", formatLink);
        }
    });
}

function searchPost() {
    const searchInput = document.getElementById('post-search');
    searchInput.onkeypress = e => {
        if(e.key === 'Enter') {
            const  url = new URL(window.location.href);
            const searchValue = searchInput.value;
            url.searchParams.delete('post_category');
            url.searchParams.delete('page');

            url.searchParams.set('search', searchValue);
            window.location.replace(url.toString());
        }
    }
}

function displayDeleteAll(deleteAllBtn) {
    deleteAllBtn.classList.remove('d-none');
    deleteAllBtn.classList.add('d-block');
}

function undisplayDeleteAll(deleteAllBtn) {
    deleteAllBtn.classList.remove('d-block');
    deleteAllBtn.classList.add('d-none');
}

function checkAll() {
    const checkboxs = document.querySelectorAll('.check-input');
    const checkAll = document.querySelector('.check-all-input');
    const deleteAllBtn = document.querySelector('.btn-delete-all');
    let countSelected = 0;
    checkboxs.forEach(checkbox => {
        checkbox.onclick = () => {
            if (checkbox.checked)
                countSelected++;
            else
                countSelected--;

            if (countSelected === checkboxs.length)
                checkAll.checked = true;
            else checkAll.checked = false;

            if (countSelected > 0) {
                displayDeleteAll(deleteAllBtn);
            } else {
                undisplayDeleteAll(deleteAllBtn);
            }
        }
    });


    checkAll.onclick = () => {
        if (checkAll.checked) {
            countSelected = checkboxs.length;
            checkboxs.forEach(checkbox => {
                checkbox.checked = true;
            });
        } else {
            countSelected = 0;
            checkboxs.forEach(checkbox => {
                checkbox.checked = false;
            });
        }
        if (countSelected > 0) {
            displayDeleteAll(deleteAllBtn);
        } else {
            undisplayDeleteAll(deleteAllBtn);
        }
    }
}

function submitDelete() {
    const deleteForm = document.getElementById('deletePostForm');
    deleteForm.submit();
}

function submitSelectDelete() {
    const deleteForm = document.getElementById('deletePostForm');
    const input = deleteForm.querySelector('input[name="postIds"]');
    const selectedCheckboxs = document.querySelectorAll('.check-input');
    const postIds = [];
    const submitLink = deleteLink;
    deleteForm.setAttribute('action', submitLink);
    selectedCheckboxs.forEach((checkbox, index) => {
        if (checkbox.checked)
            postIds.push(parseInt(document.querySelectorAll('.btn-delete')[index].getAttribute('postId')));
    })
    input.value = postIds;
    deleteForm.submit();
}

function searchListener() {
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const oldSearchValue = params.get('search');
    const searchWrap = document.querySelector('.search-wrap');
    const input = searchWrap.querySelector('input');
    input.value = oldSearchValue;

    searchWrap.onclick = () => {
        searchWrap.classList.add('active');
    }

    input.onblur = () => {
        searchWrap.classList.remove('active');
    }
}

searchListener();
checkAll();
changeSelect();
passDataToModal();
searchPost();