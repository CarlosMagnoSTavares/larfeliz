// x = fetch(chrome.extension.getURL('/popup.html'))
//     .then(response => response.text())
//     .then(data => {
//         //document.getElementsByTagName("head")[0].innerHTML += data;
//     	//console.log(data);
//         document.body.innerHTML += data;
//         document.getElementById("btnnow").href = "http://www.google.com?q=ABRINDO_CHAMADO_PARA_"+window.location.href;

//         // console.log(x); 
//         // console.log(y);
    
//     }).catch(err => {
//         console.log('ERROR');
//     });



var xmlHttp = null;

xmlHttp = new XMLHttpRequest();
xmlHttp.open( "GET", chrome.extension.getURL ("popup.html"), false );
xmlHttp.send( null );

var inject  = document.createElement("div");
inject.innerHTML = xmlHttp.responseText
document.body.insertBefore (inject, document.body.firstChild);

document.getElementById("btnnow").href = "https://pt-br.lmgtfy.com/?q=Abrir+chamado+sistema+:"+window.location.href+"&p=1&s=y&t=w";



