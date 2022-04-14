async function loadContent() {
    let content = await fetch('../templates/async/file_download.php');
    content = await content.text();
    document.querySelector('.async_form').innerHTML = content;
}

function unsetContent() {
    let div = document.getElementsByClassName('async_form');
    document.querySelector('.launch-file').remove();
}

document.querySelector('.yes').addEventListener('click', loadContent);
document.querySelector('.no').addEventListener('click', unsetContent);

