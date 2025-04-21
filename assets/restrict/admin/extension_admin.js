const xmml = new XMLHttpRequest;

function PopUpRequest(modal, exitButton, urlShort, urlSend) {

    xmml.open('GET', '../../../assets/lib/html_lib/' + urlShort, true);
    xmml.onreadystatechange = function () {

        if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

            let resp = xmml.responseText;
            document.body.insertAdjacentHTML("beforeend", resp);

            document.querySelector(modal).style.display = 'block';
            document.querySelector('*').style.overflow = 'hidden';
            document.querySelector(modal).style.overflow = 'visible';

            if (document.querySelector(modal)) {

                let form = document.querySelector(".akashic-modal form");
                form.addEventListener('submit', (evt) => {
                    evt.preventDefault();
                    const formData = new FormData(form);
                    dataPost(urlSend, formData);
                })
            }

            if (document.querySelector(modal)) {
                document.querySelector(exitButton).addEventListener('click', () => {

                    document.querySelector(modal).style.display = 'none';
                    document.querySelector('*').style.overflow = 'visible';
                    document.querySelector(modal).remove();
                })
            }

        }
    }
    xmml.send();

}

function dataPost(url, param1) {
    xmml.open('POST', '../../../assets/modules/' + url);
    //xmml.setRequestHeader('Content-type', 'Application/x-www-form-urlencoded');
    xmml.onreadystatechange = function () {
        if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
            try {
                let answer = JSON.parse(xmml.responseText);
                console.log(answer);
            } catch (error) {
                console.log(xmml.responseText);
            }
        }
    }
    xmml.send(param1);
}

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

let ajax = (formData = "", url, method) => new Promise((resolve, reject) => {
    let xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status >= 200 && xmlhttp.status <= 299) {
                resolve(xmlhttp.responseText);
            } else {
                reject({ status: xmlhttp.status, message: xmlhttp.responseText });
            }
        }
    }
    if (method == "POST") {
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    xmlhttp.open(method, url, true);
    xmlhttp.send(formData);
});

let fn1 = async (menu, page = "", el = "") => {
    try {
        let resp = await ajax("", `pages/pages.php?page=${page}`, "GET");
        resp = JSON.parse(resp);
        if (resp.success) {
            document.querySelector(".panel-page-flash").innerHTML = resp.html;

            if (document.querySelector('.shopItems-Interface')) {
                document.querySelector(".eixo-button").addEventListener('click', () => {
                    PopUpRequest('.akashic-modal', '.escape-background', 'lib_ProductShop.php', 'module_item_product.php');
                });
            }
            if(document.querySelector('.cupons-interface')){
                document.querySelector(".eixo-button").addEventListener('click', () => {
                    PopUpRequest('.akashic-modal', '.escape-background', 'lib_CupomAdmin.php', 'module_main.php');
                });
            }
        }
        menu.forEach(async (el, key) => {
            if (el.classList.contains('active')) {
                el.classList.remove('active');
            }
        });
        el.classList.add('active');
    } catch (error) {
        document.querySelector("#outputError").innerHTML = `Error ${error}`;
    }
}

window.onload = async () => {
    let menu = document.querySelectorAll(".panel-flash-container > ul >li.menu");
    let elPage = document.querySelector(".panel-page-flash");
    if (elPage.innerHTML == "") {

        await fn1(menu, btoa("Home"), menu[0]);
        littleFunction();

    }
    menu.forEach(async (el, key) => {
        el.addEventListener("click", async evt => {
            await fn1(menu, btoa(el.innerText), el);
            littleFunction();
        });
    });

}

function littleFunction() {

    if (document.querySelector('#myChart')) {

        var ctxP = document.querySelector('#myChart').getContext('2d');
        var chartGraph = new Chart(ctxP, {
            type: 'doughnut',
            data: {
                labels: ["Vip Vanilla", "Vip Radio", "Vip Avarossa"],
                datasets: [{
                    data: [70, 50, 100],
                    label: 'Red',
                    backgroundColor: ["#46BFBD", "#FDB45C", "crimson"],
                    hoverBackgroundColor: ["#5AD3D1", "#FFC870", "#f71744"]
                }]
            },
            options: {
                responsive: true,
                borderWidth: 0,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: 'white',
                            borderline: 0,
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }

        })

        /*        let ctxP = document.querySelector('#pieChart').getContext('2d');
                var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                        datasets: [{
                            data: [70, 50, 100, 40, 120],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });*/

    }

    if (document.querySelector('#chartGraph')) {

        var cpx = document.querySelector('#chartGraph').getContext('2d');
        var barChart = new Chart(cpx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [
                    {
                        label: 'Teste',
                        data: [50],
                        backgroundColor: '#46BFBD'
                    },
                    {
                        label: 'Teste2',
                        data: [97],
                        backgroundColor: 'greenyellow'
                    },
                    {
                        label: 'Teste3',
                        data: [30],
                        backgroundColor: 'red'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: "white",
                            fontsize: 30
                        }
                    },
                    y: {
                        max: 100,
                        ticks: {
                            color: "white"
                        }
                    }
                }
            }
        })

    }

}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

async function getPlayersOnline() {
    try {
        let responseData = await ajax("", "../../../assets/modules/module_panel_online.php", "GET");
        responseData = JSON.parse(responseData);
        if (responseData.onlinePlayer == null) {
            document.querySelector('#interact-fluid-panel').innerText = 0;
        } else {
            document.querySelector('#interact-fluid-panel').innerText = responseData.onlinePlayer;
        }

        time = 5000;
    } catch (error) {
        let message;
        if (error.hasOwnProperty('message')) {
            if (isJson(error.message)) {
                message = JSON.parse(error.message);
                console.log("Erro ao atualizar jogadores online.\nError: " + message.message);
            } else {
                console.log("Erro ao atualizar jogadores online.\nError2: " + error.message);
            }

        }
        //console.log(error);
        //console.log(error.name);
        document.querySelector('#interact-fluid-panel').innerText = 0;
        clearInterval(idIntervel);
    }
}

(function refreshPlayersOnline() {
    if (document.querySelector(".ipc-panel-onlinePlayers")) {
        getPlayersOnline();
        let idIntervel = setInterval(async () => {
            getPlayersOnline();
        }, 5000);
    }
})();

if (document.querySelector('#exit-sign')) {

    document.querySelector('#exit-sign').addEventListener('click', () => {

        window.location.href = "https://forbiddenseries.net";

    });

}