function showReplyForm() {
    const reply = document.querySelector('.reply');
    const replyBtn = document.querySelector('.reply-btn');
    const hideReplyBtn = document.querySelector('.hide-reply-btn');

    reply.classList.remove('d-none');
    reply.classList.add('d-block');

    replyBtn.classList.remove('d-block');
    replyBtn.classList.add('d-none');

    hideReplyBtn.classList.remove('d-none');
    hideReplyBtn.classList.add('d-block');
}

function hideReplyForm() {
    const reply = document.querySelector('.reply');
    const replyBtn = document.querySelector('.reply-btn');
    const hideReplyBtn = document.querySelector('.hide-reply-btn');

    reply.classList.remove('d-block');
    reply.classList.add('d-none');

    replyBtn.classList.remove('d-none');
    replyBtn.classList.add('d-block');

    hideReplyBtn.classList.remove('d-block');
    hideReplyBtn.classList.add('d-none');
}

const replyForm = document.querySelector('.reply_form');
replyForm.onsubmit = e => {
    e.preventDefault();
    const sendIdInput = document.querySelector('input[name="send_id"]');
    const receiveIdInput = document.querySelector('input[name="receive_id"]');
    const oldMessageIdInput = document.querySelector('input[name="old_message_id"]');

    
    sendIdInput.value = sendId;
    receiveIdInput.value = receiveId;
    oldMessageIdInput.value = window.location.href.split('/')[window.location.href.split('/').length - 1];

    replyForm.submit();
}