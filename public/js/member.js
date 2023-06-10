function isHasInputField(element) {
    const input = element.querySelector('input');
    return input != null;
}


function updateRowData(row) {
    const rowCols = row.querySelectorAll('td');
    rowCols.forEach(rowCol => {
        if(isHasInputField(rowCol)) {
            const rowColInput = rowCol.querySelector('input');
            const data = rowColInput.value.trim();
            rowCol.textContent = data;
            rowCol.setAttribute('data', data);
        }
    });
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
        
                        saveBtn.onclick = () => {
                            updateRowData(col.parentNode);
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



changeData('.role_col', '.email_col', '.role_col', '.phone_col');
