function isHasInputField(element) {
    const input = element.querySelector('input');
    return input != null;
}


async function updateRowData(row) {
    const rowCols = row.querySelectorAll('td');
    const formData = new FormData();
    rowCols.forEach(rowCol => {
        if(isHasInputField(rowCol)) {
            const fieldValue = rowCol.getAttribute('feild');
            const rowColInput = rowCol.querySelector('input');
            const data = rowColInput.value.trim();
            rowCol.textContent = data;
            rowCol.setAttribute('data', data);
            formData.append(fieldValue, data);
        }
    });

    formData.append('id', parseInt(row.getAttribute('memberId')));

    const api = await fetch(updateUserApiLink, {
        method: 'POST',
        body: formData,
    });

    const response = await api.json();
    const message = response.message;
    showAlert(message);

}

function createAlertElement() {
    const alert = document.createElement('div');
    alert.className = 'my-alert';

    //header

    const header = document.createElement('div');
    header.className = 'my-alert_header';

    const img = document.createElement('img');
    const alertTitle = document.createElement('p');
    img.src = alertIcon;
    alertTitle.className = 'my-alert_title';
    alertTitle.textContent = 'Success';

    header.appendChild(img);
    header.appendChild(alertTitle);

    //Body
    const body = document.createElement('div');
    body.className = 'my-alert_body';

    const bodyContent = document.createElement('p');
    bodyContent.className = 'my-alert_body_content';
    body.appendChild(bodyContent);

    
    const footer = document.createElement('div');
    const footerBtns = document.createElement('div');
    const closeBtn = document.createElement('button');

    footer.className = 'my-alert_footer';
    footerBtns.className = 'my-alert_footer_buttons';
    closeBtn.textContent = 'Close';

    footerBtns.appendChild(closeBtn);
    footer.appendChild(footerBtns);
    
    alert.appendChild(header);
    alert.appendChild(body);
    alert.appendChild(footer);

    return alert;
}

function showAlert(message) {
    const alertWrap = document.querySelector('.alert-wrap');
    const alert = createAlertElement();
    alert.classList.add('show');
    if(alertWrap.childNodes.length > 0) {
        let height = alertWrap.childNodes[0].offsetHeight;
        alert.style.top = `${100 + height * alertWrap.childNodes.length}px`;
    }
    const bodyContent = alert.querySelector('.my-alert_body_content');
    alert.classList.add('show');
    bodyContent.textContent = message;

    alertWrap.appendChild(alert);

    const closeBtn = alert.querySelector('.my-alert_footer_buttons > button');
    closeBtn.onclick = () => {
        bodyContent.textContent = '';
        alert.classList.remove('show');
        alertWrap.removeChild(alert);
        clearTimeout();
    }

    setTimeout(() => {
        bodyContent.textContent = '';
        alert.classList.remove('show');
        alertWrap.removeChild(alert);
    }, 3000);
}

function cancelUpdateRowData(row) {
    const rowCols = row.querySelectorAll('td');
    rowCols.forEach(rowCol => {
        if(isHasInputField(rowCol)) {
            const data = rowCol.getAttribute('data');
            rowCol.textContent = data;
        }
    });
}

function changeData(...rules) {
    rules.forEach(rule => {
        const cols = document.querySelectorAll(rule);
        cols.forEach(col => {
            col.onclick = () => {
                col.classList.add('typing');
                if(col.classList.contains('typing')) {
                    const buttonGroup = col.parentNode.querySelector('.member_button_group');
                    const saveBtn = buttonGroup.querySelector('.member_save_btn');
                    const cancelBtn = buttonGroup.querySelector('.member_cancel_btn');
                    const colWidth = col.offsetWidth;
                    const data = col.getAttribute('data');
                    const input = document.createElement('input');
                    
                    if(!isHasInputField(col)) {
                        input.style.width = `${colWidth}px`;
                        input.value = data;
                        col.textContent = "";
                        col.appendChild(input);
    
                        buttonGroup.style.display = 'flex';
        
                        saveBtn.onclick = async () => {
                            await updateRowData(col.parentNode);
                            col.classList.remove('typing');
                            buttonGroup.style.display = 'none';
                        }
        
                        cancelBtn.onclick = () => {
                            cancelUpdateRowData(col.parentNode);
                            col.classList.remove('typing');
                            buttonGroup.style.display = 'none';
                        }
                    }
    
                }
            }
        });
    });
}



changeData('.name_col' ,'.email_col', '.phone_col');
