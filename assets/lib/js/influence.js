// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

const xmml = new XMLHttpRequest();

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
if(document.querySelector('.main-navbar-div')){
	document.querySelector('.main-navbar-div').addEventListener('click', ()=>{
		window.location.href = "https://forbiddenseries.net";
	})
}
let urlr = [
	'lib_vipvanila.php',
	'lib_vipradio.php',
	'lib_vipavaroza.php',
	'lib_vipterminus.php',
	'lib_cash.html',
	'lib_blocks.html'
];

let buttonOpenXRG = [
	'#button-nrg-vipvanila',
	'#button-nrg-vipradio',
	'#button-nrg-vipavaroza',
	'#button-nrg-vipterminus'
];

let xrgOpeningButton = [
	'#xrg-buttonOpening-xi',
	'#xrg-buttonOpening-xii'
];

let modalTarget = [
	'#wdt-vipvanilla',
	'#wdt-vipradio',
	'#wdt-vipavaroza',
	'#wdt-vipterminus',
	'#xrg-droptower-cashObtain',
	'#xrg-droptower-getBlockProtection'
];

let exitButton = [
	'#window-droptower-close-xi',
	'#window-droptower-close-xii',
	'#window-droptower-close-xiii',
	'#window-droptower-close-XIV',
	'#xrg-droptower-close-xi',
	'#xrg-droptower-close-xii'
];

let selection = [
	'#wdt-selection-xi',
	'#wdt-selection-xii',
	'#wdt-selection-xiii',
	'#wdt-selection-XIV'
];

let outputLT = [
	'#wdt-labelviewTotal-xi',
	'#wdt-labelviewTotal-xii',
	'#wdt-labelviewTotal-xiii',
	'#wdt-labelviewTotal-XIV',
	'#xrgDroptwoer-label-xi',
	'#xrgDroptwoer-label-xii'
];

let inputLenght = [
	'#xrgDroptower-input-xi',
	'#xrgDroptower-input-xii'
];

function PopUpRequest(buttonTarget, modal, exitButton, url, $input, $valueMax, $price, $output) {

	document.querySelector(buttonTarget).addEventListener('click', () => {

		xmml.open('GET', '../../../assets/lib/html_lib/' + url, true);
		xmml.onreadystatechange = function () {

			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

				let resp = xmml.responseText;
				document.body.insertAdjacentHTML("beforeend", resp);

				if (document.querySelector('.window-droptower')) {

					document.querySelector(".wdt-details-vip").addEventListener('click', (evt) => {
						evt.preventDefault();
						newGroundsRequest("lib_modal_image.html", "GET", ".background-exit");
					})

					NAOSEIQUALNOMEEUCOLOCOAQUI(".window-droptower");

				}

				document.querySelector(modal).style.display = 'block';
				document.querySelector('*').style.overflow = 'hidden';
				document.querySelector(modal).style.overflow = 'visible';

				if ($input === selection[0] || $input === selection[1] || $input === selection[2]) {
					Selections($input, $valueMax);

					totalPrices($input, $price, $output);
				}

				if ($input === inputLenght[0], inputLenght[1]) {
					LengthLimiter($input);
					totalPrices($input, $price, $output);
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
	})

}

function Selections(target, maximus) {

	for (let i = 1; i < maximus; i++) {
		let option = document.createElement("option")
		option.value = i
		if (i == 1) {
			option.text = i + ' Mês'
		} else {
			option.text = i + ' Meses'
		}
		document.querySelector(target).appendChild(option);
	}

}

function totalPrices(target, price, labeltarget) {

	if (target === selection[0] || target === selection[1] || target === selection[2]) {
		document.querySelector(target).addEventListener('input', (evt) => {
			let event = evt.target ? evt.target.value : evt.value;
			let r;

			r = price * event;

			var arrg = String(r).split(".");
			if (arrg[1] > 2) { arrg[1] = arrg[1].substr(0, 2) }

			if (arrg[0] == 'NaN' || arrg[1] == 'undefined' || arrg[0] == '0') {
				document.querySelector(labeltarget).textContent = "0 R$";
			} else {
				document.querySelector(labeltarget).textContent = arrg[0] + ',' + arrg[1] + ' R$';
			}

		})
	} else if (target === inputLenght[0] || target === inputLenght[1]) {
		document.querySelector(target).addEventListener('input', (evt) => {
			let event = evt.target ? evt.target.value : evt.value;
			let r;

			if (document.querySelector(target).value == 1) {
				r = price * event
			} else if (document.querySelector(target).value > 1) {
				r = price * event;
			}

			var arrg = String(r).split(".");
			if (arrg[1] > 2) { arrg[1] = arrg[1].substr(0, 2) }

			if (arrg[0] === 'undefined' || arrg[0] === 'NaN') {
				document.querySelector(labeltarget).textContent = '0 R$';
			} else if (arrg[1] == 'undefined' || arrg[1] == null || arrg[1] == false || arrg[1] == '') {
				document.querySelector(labeltarget).textContent = arrg[0] + ' R$';
			} else {
				document.querySelector(labeltarget).textContent = arrg[0] + ',' + arrg[1] + ' R$';
			}

		})
	}

}

function LengthLimiter(target) {
	document.querySelector(target).addEventListener('input', function () {
		let NoMoreDigits = /^[0-9]{0,6}?$/g;

		if (!NoMoreDigits.test(this.value)) {
			let cut = this.value.replace(/[^\d]/g, "").match(/^[0-9]{0,6}/g);
			cut = cut ? cut[0] : "";

			this.value = cut;
		}

	});
}

function InputMask() {

}

if (document.querySelector('.container-nrg')) {
	PopUpRequest(buttonOpenXRG[0], modalTarget[0], exitButton[0], urlr[0], selection[0], 1 + 1, 9.99, outputLT[0]);
	PopUpRequest(buttonOpenXRG[1], modalTarget[1], exitButton[1], urlr[1], selection[1], 3 + 1, 24.99, outputLT[1]);
	PopUpRequest(buttonOpenXRG[2], modalTarget[2], exitButton[2], urlr[2], selection[2], 12 + 1, 49.99, outputLT[2]);
	PopUpRequest(buttonOpenXRG[3], modalTarget[3], exitButton[3], urlr[3], selection[3], 12 + 1, 99.99, outputLT[3]);
	PopUpRequest(xrgOpeningButton[0], modalTarget[3], exitButton[3], urlr[3], inputLenght[0], null, 0.001, outputLT[3]);
	PopUpRequest(xrgOpeningButton[1], modalTarget[4], exitButton[4], urlr[4], inputLenght[1], null, 0.001, outputLT[4]);
}

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /


// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

/*let wdtVipVanilla = document.getElementById('wdt-vipvanilla');
if(wdtVipVanilla){
	let selectionsMonth = document.getElementById('wdt-selection');

	for(let i = 1; i < 4; i++){
		let option = document.createElement("option")
		option.value = i
		if(i == 1){
			  option.text = i + ' Mês'
		}else{
			  option.text = i + ' Meses'
		}
		selectionsMonth.appendChild(option);
	}

	selectionsMonth.addEventListener('input', (event)=>{
		let v = 9.99;
		let eventRTP = event.target ? event.target.value : event.value;
		let	resultTotalPrice = v * eventRTP;

		let  r = eventRTP;
		let rtp;

		if(selectionsMonth.value == 1){
			rtp = v * r
		}else if(selectionsMonth.value > 1){
			rtp = v * r - 2 - r;
		}

		var arrg = String(rtp).split(".");
		if(arrg[1] > 2){arrg[1] = arrg[1].substr(0, 2)}

		document.getElementById('wdt-label-totalAmount').textContent = arrg[0] + ',' + arrg[1] + ' R$';
	})*/

/*	let nrgVipVanilla = document.getElementById('button-nrg-vipvanila');
	nrgVipVanilla.addEventListener('click', ()=>{
		$("#wdt-vipvanilla").fadeIn(85);
		let nrgModal = document.querySelector('#wdt-vipvanilla');
		nrgModalOpen(nrgModal);
	});*/

/*	let nrgCloseVV = document.getElementById('window-droptower-close-vv');
	nrgCloseVV.addEventListener('click', ()=>{
		document.querySelector('#wdt-vipvanilla').style.display = 'none';
		document.querySelector('*').style.overflow = 'visible';
	});

}*/

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

let stringsSMIF = [
	'#dm-label2',
	'#total-purchase',
	'#dropmodal-pb-buttonPurchase',
	'#dm-label3',
	'#dm-label1'
];

if (document.getElementById('passe-beta')) {

	document.getElementById('passe-beta').addEventListener('click', () => {
		xmml.open('GET', '../../../assets/lib/html_lib/lib_loja_infopassebeta.html', true);
		xmml.onreadystatechange = function () {

			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
				let resp = xmml.responseText;
				document.body.insertAdjacentHTML("beforeend", resp);

				document.querySelector('#passebeta-dm-interface-1').style.display = 'block';
				document.querySelector('*').style.overflow = 'hidden';
				document.querySelector('#passebeta-dm-interface-1').style.overflow = 'visible';

			}
			if (document.querySelector('#passebeta-dm-interface-1')) {
				//SingleMaskInputFunction(stringsSMIF[0], 16.99, stringsSMIF[1], stringsSMIF[2], stringsSMIF[3], stringsSMIF[4]);

				document.querySelector('#dm-close-1').addEventListener('click', () => {

					document.querySelector('#passebeta-dm-interface-1').style.display = 'none';
					document.querySelector('*').style.overflow = 'visible';
					document.querySelector('#passebeta-dm-interface-1').remove();
				})
			}

		}
		xmml.send();
	})

}

if(document.querySelector('.cart-Container')){
	//SingleMaskInputFunction('#itemInput-Indentity', 9.99, '#itemIDPrice-1', null, '#itemInputIncrement','#itemInputDecrement');
}

// Essa function vai operar se a request tenha sido um êxito
function SingleMaskInputFunction(target, price, output, $buttonPurchase, $incrementTarget, $decrementTarget) {

	document.querySelector(target).addEventListener('input', () => {
		SMIFExtensionI(target, price, output);
	});

	if($buttonPurchase){
		document.querySelector($buttonPurchase).addEventListener('click', () => {

			if (arr[0] >= 17) {
				Swal.fire({
					icon: 'question',
					title: 'Deseja continuar ?',
					text: 'Você está preste a concluir sua compra',
					showCancelButton: true,
					confirmButtonColor: '#83eb34',
					cancelButtonColor: '#d33'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "https://forbiddenseries.net/assets/db/restrict/table_products/passe_beta.php";
					} else if (result.isDismissed) {
						return true;
					}
				})
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
			}
		});
	}

	/*const tMixed = document.querySelector(target)
	tMixed.addEventListener('input', function () {
		let NoMoreDigits = /^[0-9]{0,2}?$/g;
		if (!NoMoreDigits.test(this.value)) {
			let cut = this.value.replace(/[^\d]/g, "").match(/^[0-9]{0,2}/g);
			cut = cut ? cut[0] : "";
			this.value = cut;
		}
	});*/

	/*document.querySelector($incrementTarget).addEventListener('click', evt => {

		let eventTick = evt.target.value;

		let num = +tMixed.value;
		if (num >= 99) {
			tMixed.value = "99";
		} else {
			tMixed.value = ++num;
		}

		SMIFExtensionI(target, price, output)
	});

	document.querySelector($decrementTarget).addEventListener('click', evt => {

		let eventTick = evt.target.value;

		let num = +tMixed.value;
		if (num > 1) {
			tMixed.value = --num;
		}
		SMIFExtensionI(target, price, output)
	});*/

}

function SMIFExtensionI(target, price, output) {
	let eventTick = document.querySelector(target).target ? document.querySelector(target).target.value : document.querySelector(target).value;

	if (eventTick.length <= 2) {

		var result = eventTick * price;

		var arr = String(result).split(".");
		if (arr[0] == 'NaN' || arr[1] == 'undefined' || arr[0] == '0') {
			document.querySelector(output).textContent = "R$ 0,00";
		} else {
			var totalCents = arr[1];

			if (arr[1] > 2) { var totalCents = totalCents.substr(0, 2) }
			document.querySelector(output).textContent = "R$ " + arr[0] + ',' + totalCents;

		}

	}
}



// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

//Login Form

var gemLogin = document.getElementById("l-login-open");
if (gemLogin) {

	gemLogin.addEventListener('click', () => {

		document.querySelector(".login").style.display = "block";
		document.querySelector("*").style.overflow = 'hidden';

	});

	document.getElementById("close-background-login").addEventListener('click', () => {

		document.querySelector(".login").style.display = "none";
		document.querySelector("*").style.overflow = 'visible';

	});

}

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /



// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

let keyWindow = [
	'#ativar-key',
	'.keydroptower-container',
	'.keydroptower-exit'
]

let donateWindow = [
	'#donate-action-1',
	'.dc-newgrounds',
	'.dc-background-exit'
]

let registerWindow = [
	'.modal-register',
	'.rc-newground',
	'.rc-background-exit'
]

if (document.querySelector('#ativar-key')) {
	requestNewgrounds(keyWindow[0], keyWindow[1], keyWindow[2], 'lib_keyDroptower.php', null, 'GET');
}

if (document.getElementById('donate-action-1')) {
	requestNewgrounds(donateWindow[0], donateWindow[1], donateWindow[2], 'lib_donateDroptower.php', '#dc-fire-form-input', 'GET');
}

if (document.querySelector('.modal-register')) {
	requestNewgrounds(registerWindow[0], registerWindow[1], registerWindow[2], 'lib_registerDroptower.html', null, 'GET');
}

function openWindow(input, target, output) {

	document.querySelector(input).addEventListener('click', () => {
		document.querySelector(target).style.display = 'block';
		document.querySelector(target).style.overflow = 'hidden';
	})

	document.querySelector(output).addEventListener('click', () => {
		document.querySelector(target).style.display = 'none';
		document.querySelector(target).style.overflow = 'visible';
	})

}

// SKIP // SKIP

let documentDetailButtons = [
	'#xml-details-modal-1',
	'#xml-details-modal-2',
	'#xml-details-modal-3',
	'#xmli-download-btn-xi',
	'#xmli-download-btn-xii'
]

let xmdNewgroundsModal = [
	'#xmd-newgrounds-xi',
	'#xmd-newgrounds-xii',
	'#xmd-newgrounds-xiii',
	'#xmdi-xi',
	'#xmdi-xii'
]

let xmdCloseNewgrounds = [
	'#xmd-nm-closeModal-xi',
	'#xmd-nm-closeModal-xii',
	'#xmd-nm-closeModal-xiii',
	'#xml-download-closeModal-xi',
	'#xml-download-closeModal-xii'
]

let xmdNewgroundsUrl = [
	'lib_nm_interface_xi.html',
	'lib_nm_interface_xii.html',
	'lib_nm_interface_xiii.html',
	'lib_xdw_xi.html',
	'lib_xdw_xii.html'
]

if (document.querySelector('.container-xml')) {
	requestNewgrounds(documentDetailButtons[0], xmdNewgroundsModal[0], xmdCloseNewgrounds[0], xmdNewgroundsUrl[0], null, 'GET')
	requestNewgrounds(documentDetailButtons[1], xmdNewgroundsModal[1], xmdCloseNewgrounds[1], xmdNewgroundsUrl[1], null, 'GET')
	requestNewgrounds(documentDetailButtons[2], xmdNewgroundsModal[2], xmdCloseNewgrounds[2], xmdNewgroundsUrl[2], null, 'GET')

	requestNewgrounds(documentDetailButtons[3], xmdNewgroundsModal[3], xmdCloseNewgrounds[3], xmdNewgroundsUrl[3], null, 'GET')
	requestNewgrounds(documentDetailButtons[4], xmdNewgroundsModal[4], xmdCloseNewgrounds[4], xmdNewgroundsUrl[4], null, 'GET')
}

function maskDonate(target) {
	document.querySelector(target).addEventListener('input', function () {

		//retirando qualquer coisa que não seja número
		let justNumbers = this.value.replace(/[^0-9]/g, '');

		// retirando zeros a esquerda
		justNumbers = justNumbers.replace(/^0+/, '');

		let centavos;
		let reais = '0';
		if (justNumbers.length >= 2) {
			centavos = justNumbers.substr(justNumbers.length - 2);
			reais = justNumbers.substr(0, justNumbers.length - 2) || '0';
		} else {
			centavos = '0' + (justNumbers.substr(justNumbers.length - 1) || '0');
		}

		this.value = 'R$ ' + reais + ',' + centavos;
	});
}

//var login_form = document.getElementById("button-login-one");
/*function stopEvent(evt){
	evt.preventDefault();
}*/

/*login_form.addEventListener('click', (evt)=>{
	evt.preventDefault();
	
	var xmlhttp = new XMLHttpRequest;
	xmlhttp.open('POST', 'assets/lib/auth/index.php', true);
	xhr.responseType = 'text';
	
	xhr.onload = function () {
		
		
		
	}
	
})*/

function sendData() {

}

if (document.getElementById('form-login')) {
	document.getElementById('form-login').addEventListener('submit', (evt) => {
		evt.preventDefault();

		let datausername = evt.path[0].querySelector("input[name=username]").value;
		let datapassword = evt.path[0].querySelector("input[name=password]").value;

		let datapost = 'username=' + datausername + '&password=' + datapassword;
		xmml.open('POST', '../../../assets/modules/auth/index.php', true);
		xmml.setRequestHeader('Content-type', 'Application/x-www-form-urlencoded');
		xmml.onreadystatechange = function () {

			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

				let env = JSON.parse(xmml.responseText)

				if (env.auth == true) {
					location.reload();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Login invalido',
						text: 'Dados Incorretos, Username ou Senha Errados!',
					})
				}
			}
		}
		xmml.send(datapost)
	})
}

if (document.getElementById('a-2')) {
	//Unbound Session
}

/*document.addEventListener('DOMContentLoaded', () => {
	fetch('../assets/lib/html_lib/lib_loja_infopassebeta.html').then(async (response) => {
		var parser = new DOMParser()
		var text = await response.text()
		var html = parser.parseFromString(text, 'text/html')
		document.querySelector('#passe-alpha').addEventListener('click', () => {
			document.querySelector('#dm-container-1').style.display = 'block'
			document.querySelector('#dm-container-1').innerHTML = text
			document.querySelector('#dm-close-1').addEventListener('click', () => {
			   document.querySelector('#dm-close-1').remove()
			   document.querySelector('#dm-container-1').style.display = 'none'
		   })
		})
	})
})*/

if (document.querySelector('.page-panel-interface-1')) {

	/*	var dataShare = new FormData;
	
		document.querySelector('#pbp-button-submit').addEventListener('click', (evt)=>{
			evt.preventDefault();
	
			let datatitle = evt.path[1].querySelector("input[name=publishing-title]").value;
			let datadescription = evt.path[1].querySelector("textarea[name=publishing-desc]").value;
			let datafile = evt.path[1].querySelector("input[name=userfile]").value;
			let dataAuthor = evt.path[1].querySelector("input[name=publishing-author]").value;
			let dataAuthorLevelPermission = evt.path[1].querySelector("input[name=publishing-author-level]").value;
		
			let dataInfos = 'publishing-title=' + datatitle + '&publishing-desc=' + datadescription + '&userfile=' + datafile + '&publishing-author=' + dataAuthor + '&publishing-author-level=' + dataAuthorLevelPermission;
	
			xmml.open('POST', '../../../assets/modules/module_publishing.php', true);
			xmml.setRequestHeader('Content-type', 'Application/x-www-form-urlencoded');
			xmml.onreadystatechange = function() {
		
				if(xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4){
					
					let env = JSON.parse(xmml.responseText);
					console.log(env);
	
				} +
			}
			xmml.send(dataInfos);
	
		})*/
}

if (document.querySelector('.trx-container')) {
	document.querySelector('.trx-container').addEventListener('click', () => {
		window.location.href = 'https://forms.gle/uvnhWSEBNgrTyc7P9';
	});
}

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

function removeElement(target) {
	document.querySelector(target).remove();
}

function newGroundsRequest(url, HTTP, closeString) {
	xmml.open(HTTP, '../../../assets/lib/html_lib/' + url, true);
	xmml.onreadystatechange = function () {

		if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
			let resp = xmml.responseText;
			document.body.insertAdjacentHTML("beforeend", resp);

			document.querySelector(closeString).addEventListener('click', () => {
				removeElement(".wdt-modal-image");
			});


		}
	}
	xmml.send();
}


function requestNewgrounds(init, target, abort, url, $targetInput, HTTP) {

	document.querySelector(init).addEventListener('click', () => {

		xmml.open(HTTP, '../../../assets/lib/html_lib/' + url, true);
		xmml.onreadystatechange = function () {

			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

				let resp = xmml.responseText;
				document.body.insertAdjacentHTML("beforeend", resp);

				if (target == '.dc-newgrounds') {
					maskDonate($targetInput);
				}

				if (target == '.keydroptower-container') {
					document.getElementById('submit-button-serial').addEventListener('click', (evt) => {
						evt.preventDefault();

						document.querySelector('.loadingInfos').style.display = 'block';

						let dataSerialEnv = evt.path[1].querySelector("input[name=serialID]").value;
						let dataUserSerialEnv = evt.path[1].querySelector("input[name=usernameSerial]").value;
						let dataenv = 'serialID=' + dataSerialEnv + '&usernameSerial=' + dataUserSerialEnv;

						xmml.open('POST', '../../../assets/modules/module_process_key_activation.php', true);
						xmml.setRequestHeader('Content-type', 'Application/x-www-form-urlencoded');
						xmml.onreadystatechange = function () {

							if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

								document.querySelector('.loadingInfos').style.display = 'none';

								let env = JSON.parse(xmml.responseText);
								if (env.alredyClaimed == false) {

									if (env.name) {
										document.querySelector('#product-revel').textContent = env.name;
										document.querySelector('.nameProduct-division').style.display = 'block';

										if (env.name == 'Vip Vanilla') { document.querySelector('#product-revel').style.color = '#1BB6A4' }
										if (env.name == 'Vip Radio') { document.querySelector('#product-revel').style.color = '#ffd902' }
										if (env.name == 'Vip Avaroza') { document.querySelector('#product-revel').style.color = 'crimson' }

									}

									if (env.key) {
										document.querySelector('#key-append').textContent = env.key;
										document.querySelector('.key-division').style.display = 'block';
									}

									if (env.beta) {
										document.querySelector('#key-append').textContent = 'Você foi inserido na lista dos Beta Testers!';
										document.querySelector('.key-division').style.display = 'block';
									}

									document.querySelector('.revelInfo').style.display = 'block';
								}

								if (env.alredyClaimed == true) {

									document.querySelector('.revelInfo').style.display = 'none';
									Swal.fire({
										icon: 'error',
										title: 'Serial-ID já usado',
										text: 'Serial-ID já ativado por outra pessoa',
									})

								}

								if (env.invalid == true) {

									Swal.fire({
										icon: 'error',
										title: 'Serial-ID Invalido',
										text: 'Tem certeza que é esse Serial ID está correto ?',
									})

								}

							}

						}
						xmml.send(dataenv);
					})
				}

				if (document.querySelector(".dc-fire-form")) {

					document.querySelector("#dc-fire-form-submit").addEventListener('click', (evt) => {

						evt.preventDefault();

						//document.querySelector('.loadingInfos').style.display = 'block';

						let dataValueDonate = evt.path[1][1].value;
						let dataUsernameInfo = evt.path[1][0].value;
						let envSinister = 'ffi-value=' + dataValueDonate + '&ffi-username=' + dataUsernameInfo;

						xmml.open('POST', '../../../assets/modules/module_process_donate.php', true);
						xmml.setRequestHeader('Content-type', 'Application/x-www-form-urlencoded');
						xmml.onreadystatechange = function () {

							if (xmml.status >= 200 && xmml.status < 299 && xmml.readyState == 4) {

								//document.querySelector('.loadingInfos').style.display = 'none';

								let foo = xmml.responseText;
								let env = JSON.parse(foo);

								if (env.value == 0) {
									Swal.fire({
										icon: 'error',
										title: 'Valor Invalido',
										text: 'Você precisa definir um valor para doar!',
									})
								}

								if (env.value == 1) {
									Swal.fire({
										icon: 'error',
										title: 'Muito pouco',
										text: 'O Valor minimo para doação é 1,00 R$!',
									})
								}

								if (env.value == 2) {
									Swal.fire(
										'Tudo certo!',
										'Espere um pouco!',
										'success'
									)
									setInterval(() => {
										window.location.href = env.return
									}, 1500);

								}

							}

						}

						xmml.send(envSinister);

					})

				}

				/*				if(document.querySelector(".window-droptower")){
				
									document.querySelector(".wdt-purchase-finishButton > button").addEventListener('click', (evt)=>{
				
										evt.preventDefault();
										//method="POST" action="assets/modules/module_marketplace.php"
				
									});
				
								}*/


				document.querySelector(target).style.display = 'block';
				document.querySelector('*').style.overflow = 'hidden';
				document.querySelector(target).style.overflow = 'visible';

				document.querySelector(abort).addEventListener('click', () => {
					document.querySelector(target).style.display = 'none';
					document.querySelector('*').style.overflow = 'visible';
					document.querySelector(target).remove();
				})
			}
		}
		xmml.send();
	})
}

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
// SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

/*xmml.open('GET', 'assets/modules/module_panel_online.php', true);
xmml.onreadystatechange = function (evt) {

	if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {

		let invic = JSON.parse(xmml.responseText);
		document.getElementById('interact-fluid-panel').textContent = invic.onlinePlayer;
		console.log(evt);
		console.log(invic);


	}
}
xmml.send();*/


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
		let responseData = await ajax("", "assets/modules/module_panel_online.php", "GET");
		responseData = JSON.parse(responseData);
		if (responseData.onlinePlayer == null) {
			document.getElementById('interact-fluid-panel').innerText = 0;
		} else {
			document.getElementById('interact-fluid-panel').innerText = responseData.onlinePlayer;
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
		document.getElementById('interact-fluid-panel').innerText = 0;
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

if (document.querySelector("#publishing-form-post")) {
	document.querySelector("#publishing-form-post").addEventListener('submit', (evt) => {

		evt.preventDefault();

		let dataInfo = new FormData();
		dataInfo.append("infoNickname", evt.path[0][0].value);
		dataInfo.append("infoLevel", evt.path[0][1].value);
		dataInfo.append("infoTitle", evt.path[0][2].value);
		dataInfo.append("infoDesc", evt.path[0][3].value);
		dataInfo.append("infoFile", evt.path[0][4].files[0]);

		xmml.open('POST', 'assets/modules/module_publishing.php', true);
		xmml.onreadystatechange = function () {

			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
				let resp = JSON.parse(xmml.responseText);
				if (resp.published == false) {
					Swal.fire({
						icon: 'error',
						title: 'Não postado',
						text: 'Algo deu Errado!',
					})
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Postagem Concluída!'
					})
					setInterval(() => {
						location.reload();
					}, 3000);
				}
			}

		}

		xmml.send(dataInfo);

	})
}

function NAOSEIQUALNOMEEUCOLOCOAQUI(form) {

	let dataForm = document.querySelector(form);
	dataForm.addEventListener('submit', (evt) => {

		evt.preventDefault();
		let drstone = new FormData(evt.path[0]);

		Swal.fire({
			icon: 'question',
			title: 'Deseja concluir sua compra?',
			showCancelButton: true,
			confirmButtonColor: '#60f542',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Prosseguir'
		}).then((result) => {
			if (result.isConfirmed) {
				xmml.open('POST', 'assets/modules/module_marketplace.php', true);
				xmml.onreadystatechange = function () {

					if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
						let resp = JSON.parse(xmml.responseText);
						if (resp.init_point_valid == true) {
							window.location.href = resp.init_point;
						}
					}

				}
				xmml.send(drstone);
			}
		})


	})
}

function formDataSend(title, username, price, type) {
	let dataSend = new FormData();

	dataSend.append("title", title);
	dataSend.append("username", username);
	dataSend.append("price", price);
	dataSend.append("productType", type);

	return dataSend;
}

/*if (document.querySelector(".dsi-items")) {
	if (document.querySelector("#dsi-form-1")) {
		NAOSEIQUALNOME("#dsi-form-1");
	}
	if (document.querySelector("#dsi-form-2")) {
		NAOSEIQUALNOME("#dsi-form-2");
	}
	if (document.querySelector("#dsi-form-3")) {
		NAOSEIQUALNOME("#dsi-form-3");
	}
	if (document.querySelector("#dsi-form-4")) {
		NAOSEIQUALNOME("#dsi-form-4");
	}
	if (document.querySelector("#dsi-form-5")) {
		NAOSEIQUALNOME("#dsi-form-5");
	}
	if (document.querySelector("#dsi-form-6")) {
		NAOSEIQUALNOME("#dsi-form-6");
	}
	if (document.querySelector("#dsi-form-7")) {
		NAOSEIQUALNOME("#dsi-form-7");
	}
	if (document.querySelector("#dsi-form-8")) {
		NAOSEIQUALNOME("#dsi-form-8");
	}
	if (document.querySelector("#dsi-form-9")) {
		NAOSEIQUALNOME("#dsi-form-9");
	}
}
*/

function NAOSEIQUALNOME(form) {
	if (document.querySelector(form)) {
		document.querySelector(form).addEventListener('submit', (evt) => {

			evt.preventDefault();

			if (evt.path[0][1].value == null || evt.path[0][1].value == false) {
				Swal.fire({
					icon: 'error',
					title: 'Você precisa estar logado!'
				})
			}else{
				Swal.fire({
					icon: 'question',
					title: 'Deseja concluir sua compra?',
					showCancelButton: true,
					confirmButtonColor: '#60f542',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Cancelar',
					confirmButtonText: 'Prosseguir'
				}).then((result) => {
					if (result.isConfirmed) {

						xmml.open('POST', 'assets/modules/module_marketplace.php', true);
						xmml.onreadystatechange = function () {

							if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
								let resp = JSON.parse(xmml.responseText);
								if (resp.init_point_valid == true) {
									window.location.href = resp.init_point;
								}
							}

						}
						xmml.send(formDataSend(evt.path[0][0].value, evt.path[0][1].value, evt.path[0][2].value, evt.path[0][3].value));

					}
				})
			}

		})
	}
}

function ClientAddItemCart(form){
	let data = document.querySelector(form);
	data.addEventListener('submit', (evt)=>{
		console.log(evt.path[0][0].value);
		console.log(evt.path[0][1].value);
		console.log(evt.path[0][2].value);
		console.log(evt.path[0][3].value);
		console.log(evt.path[0][4].value);
		evt.preventDefault();

		const formData = new FormData(data);
		formData.append('ItemID', evt.path[0][2].value);
		formData.append('ItemCard', evt.path[0][4].value);
		formData.append('ItemTitle', evt.path[0][0].value);
		formData.append('ItemDesc', evt.path[0][1].value);
		formData.append('ItemPrice', 70.25);
		formData.append('ItemType', evt.path[0][3].value);
	
		xmml.open('POST', 'assets/modules/module_main.php', true);
		xmml.onreadystatechange = function () {
	
			if (xmml.status >= 200 && xmml.status < 400 && xmml.readyState == 4) {
				let resp = JSON.parse(xmml.responseText);
				console.log(resp);
			}
	
		}
		xmml.send(formData);
	})
}

