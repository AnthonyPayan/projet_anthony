
// ICI
async function loadContent() {
    var content = await fetch('../templates/async/file_download.php');
    content = await content.text();
    document.querySelector('.async_form').innerHTML = content;
    console.log(content);
}
// ICI

function unsetContent() {
    var div = document.getElementsByClassName('async_form');
    document.querySelector('.launch-file').remove();
}


document.querySelector('.yes').addEventListener('click', loadContent);
document.querySelector('.no').addEventListener('click', unsetContent);

