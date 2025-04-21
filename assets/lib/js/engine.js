const xml = new XMLHttpRequest();
const client = new ClientController();

/*(function cartItems(){
    let dataForm = new FormData();
    dataForm.append('ArrayInfo', true);

    xml.open('POST', 'assets/modules/module_main.php', true);
    xml.onreadystatechange = function () {

        if (xml.status >= 200 && xml.status < 400 && xml.readyState == 4) {
            let response = JSON.parse(xml.responseText);
            if(response.CountItems > 0){
                console.log(response);
                for(let i = response.ArrayInit; i <= response.ArrayOver; i++){              
                    requestRemoveItem(i);
                    client.lgtLimit('.item-'+i.toString()+' input#itemInput-Indentity');
                }
            }
        }
    }
    xml.send(dataForm);
})();*/

//extendObjects.lgtLimit('.cart-items #itemInput-Indentity');

function requestRemoveItem(key){
    let dataForm = new FormData();
    dataForm.append('removeItem', true);
    dataForm.append('ItemArrayId', key);
        
    xml.open('POST', '#', true);
    xml.onreadystatechange = function () {
        
        if (xml.status >= 200 && xml.status < 400 && xml.readyState == 4) {
            document.querySelector(".item-"+key.toString()).style.filter = "opacity(0)";
            if(document.querySelector(".item-"+key.toString()).style.filter.opacity = "opacity(0)"){
                document.querySelector(".item-"+key.toString()).remove();
            }
            RequestRequestRequest();
        }
    }
    xml.send(dataForm);
}

function RequestRequestRequest(){
    let form = new FormData();
    form.append('ArrayInfo', true);

    xml.open('POST', 'assets/modules/module_main.php', true);
    xml.onreadystatechange = function () {
        if (xml.status >= 200 && xml.status < 400 && xml.readyState == 4) {
            let resp = JSON.parse(xml.responseText);
            if(resp.CountItems < 1){
                refreshByRequest();
            }
        }
    }
    xml.send(form);
}

function refreshByRequest(){
    xml.onreadystatechange = function () {
        if(xml.status >= 200 && xml.status < 400 && xml.readyState == 4){
            let par = new DOMParser();
            let result = par.parseFromString(xml.responseText, "text/html");
            let target = result.querySelector("div.cart-Column-1")
            document.querySelector("div.cart-Column-1").replaceWith(target);
        }
    }
    xml.open('GET', '#', true);
    xml.send();
}

if(document.querySelector('#carCoupomForm')){
    let formData = document.querySelector('#carCoupomForm');
    formData.addEventListener('submit', (evt)=>{

        evt.preventDefault();

        let packetData = new FormData();
        packetData.append('cupomValidation', evt.path[0][0].value);

        xml.open('POST', '../../../assets/modules/module_main.php', true);
		xml.onreadystatechange = function () {

			if (xml.status >= 200 && xml.status < 400 && xml.readyState == 4) {

				let resp = JSON.parse(xml.responseText);
                console.log(resp);
                if(resp.valid == true){
                    Swal.fire({
                        icon: 'success',
                        title: 'Cupom de ' + '-' + resp.discount + '%' + ' aplicado!',
                    }).then((result)=>{
                        if(result.isConfirmed || result.dismiss){
                            document.querySelector("#cupomInterfaceCount p").textContent = '-' + resp.discount + '%';
                            document.querySelector("#cupomInterfaceCount p").style.color = 'red';
                        }
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Cupom Invalido',
                    })
                }

            }
        }
        xml.send(packetData);
    
    })
}
