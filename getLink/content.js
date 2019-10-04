


fetch(chrome.extension.getURL('/popup.html'))
    .then(response => response.text())
    .then(data => {
        document.body.innerHTML += data;
        document.getElementById("btnnow").href = "http://www.google.com?q="+window.location.href;
        //OUTROS BLABLABLA se precisar
    }).catch(err => {
        // handle error
    });


