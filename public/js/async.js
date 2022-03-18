

async function loadContent() { 
    var content = await fetch('async/file_download'); 
    content = await content.text();
    document.querySelector('.async_form').innerHTML = content;
}


function unsetContent() {
    var div = document.getElementsByClassName('async_form');
    document.querySelector('.launch-file').remove();
}


document.querySelector('.yes').addEventListener('click', loadContent);
document.querySelector('.no').addEventListener('click', unsetContent);

