window.addEventListener('load', () => {
    initOnFormSubmit();
});


function initOnFormSubmit() {
    const form = document.querySelector('#contactUsModal form');
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            sendData(form);
        });
    }
}

function sendData(form) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData(form);

    xhr.addEventListener('load', (event) => {
        const newHtml = xhr.responseText;
        const divElement = document.createElement('div');
        divElement.innerHTML = newHtml;
        const newModelBody = divElement.querySelector('#contactUsModal .modal-body');
        const oldModelBody = document.querySelector('#contactUsModal .modal-body');

        if(newModelBody) {
            oldModelBody.innerHTML = newModelBody.innerHTML;
        }else{
            oldModelBody.innerHTML = '<p>Sorry, there was an error!</p>';
        }

        initOnFormSubmit();
    });

    xhr.addEventListener('error', (event) => {
        document.querySelector('#contactUsModal .modal-body').innerHTML = '<p>Sorry, there was an error!</p>';
    });

    xhr.open('POST', form.getAttribute('action'));
    xhr.send(formData);
}