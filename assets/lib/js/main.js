const xml = new XMLHttpRequest;

if (window.pageYOffset > 1) {
    document.querySelector("nav > ul").style.backgroundColor = 'rgba(255, 255, 255, 0.232)';
} else {
    document.querySelector("nav > ul").style.backgroundColor = 'transparent';
}

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 1) {
        document.querySelector("nav > ul").style.backgroundColor = 'rgba(255, 255, 255, 0.232)';
    } else {
        document.querySelector("nav > ul").style.backgroundColor = 'transparent';
    }
})

function modalTransition(method, timermodal, timertransition, modal) {
    document.querySelector(modal).style.transition = "all " + timertransition + "ms ease-in-out";
    (method == 'exit' ? document.querySelector(modal).style.opacity = "0" : null)
    let timer = setInterval(() => {
        (method == 'init' ? document.querySelector(modal).style.opacity = "1" : null)
        if (method == 'exit') { document.querySelector(modal).remove() }
        clearInterval(timer);
    }, timermodal)
}

function ajax(method, url, purpose, ifPOST, transition = '.container-modal') {
    xml.open(method, url, true);
    xml.onreadystatechange = function () {
        if (xml.readyState == 4) {
            let resp = xml.responseText;
            switch (purpose) {
                //Call Modal
                case 'callModal':

                    document.body.insertAdjacentHTML("beforeend", resp);
                    modalTransition('init', 1, 300, transition);

                    document.querySelector(".modal-exit").addEventListener('click', () => {
                        modalTransition('exit', 500, 500, transition);
                    });

                    if (document.querySelector(".container-login")) {
                        document.querySelector(".container-login > form > img").addEventListener('click', () => {
                            alert("O Login do serividor pode ser usado aqui!");
                        })
                    }

                    if (document.querySelector(".modal-content-purchase")) {
                        document.querySelector(".modal-content-purchase > form").addEventListener('submit', (evt) => {
                            evt.preventDefault();
                            let data = new FormData();
                            data.append("TITLE", evt.path[0][0].value);
                            data.append("USERNAME", evt.path[0][1].value);
                            data.append("QUANTITY", evt.path[0][2].value);
                            data.append("TYPE", evt.path[0][3].value);
                            ajax('POST', '../../indexTeste.php', 'sending', data);
                        })
                    }
                    break;

                //Case = Sending, its equal a HTTP POST!
                case 'sending':
                    let respXHR = JSON.parse(resp);
                    return window.location.href = respXHR.init;

                // Get Players Online
                case 'getPlayerOnline':
                    let respdata = JSON.parse(resp);
                    if (respdata.onlinePlayer == null) {
                        document.getElementById('carousel-info-players').innerText = 0;
                    } else {
                        document.getElementById('carousel-info-players').innerText = respdata.onlinePlayer;
                    }
                    break;
            }
        }
    }
    xml.send(ifPOST);
}

function formDataSend(title, username, price, type) {
    let dataSend = new FormData();
    dataSend.append("title", title);
    dataSend.append("username", username);
    dataSend.append("price", price);
    dataSend.append("productType", type);
    return dataSend;
}

if (document.querySelector(".container-login")) {
    document.querySelector("#login-button").addEventListener('click', () => {
        ajax('GET', 'assets/lib/html_lib/LOGIN.php', 'callModal', null)
    })
}

document.querySelector(".discord-button").addEventListener('click', () => {
    window.open('https://discord.gg/TVzDJ9Dn9V', '_blank').focus();
})

function sharingFunc(minimum, maximum, element, purpose) {
    for (let i = minimum; i < maximum; i++) {
        document.querySelector(element + i).addEventListener('click', ()=>{
            switch(purpose){
                case 'LAUNCHER':
                    let link_down = [
                        'https://launcher.technicpack.net/launcher4/645/TechnicLauncher.exe',
                        'https://dl.dropbox.com/s/w9rpvwz1qzwbsux/FORBIDDENZA.zip'
                    ];

                    return window.location = link_down[i];

                case 'VIP':
                    ajax('GET', 'assets/lib/html_lib/VIP' + i + '.php', 'callModal', null);
                    break;
            }
        })
    }
}

let path = window.location.pathname;
let page = path.split("/")[1];
switch (page) {
    case 'indexTeste.php':
        sharingFunc(0, 2, '.launcher-panel-', 'LAUNCHER');
        sharingFunc(1, 5, '#item-buy-', 'VIP');
        break;
}

(function refreshPlayersOnline() {
    if (document.querySelector(".carousel-logo")) {
        ajax('GET', 'assets/modules/module_panel_online.php', 'getPlayerOnline', null);
        setInterval(async () => {
            ajax('GET', 'assets/modules/module_panel_online.php', 'getPlayerOnline', null);
        }, 5000);
    }
})();




// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX
// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX
// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX// #XISIXISIPXISPIXIPSIPSIPSXIPSIX
