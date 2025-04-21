class ClientController {

    viewItemsNumber(target){
        
    }

    instantInputChange(input, price, output) {
        this.lgtLimit(input);
        document.querySelector(input).addEventListener('input', (evt) => {
            let r;

            r = price * evt.target.value;

            var arrg = String(r).split(".");
            if (arrg[1] > 2) { arrg[1] = arrg[1].substr(0, 2) }

            if (arrg[0] == 'NaN' || arrg[1] === 'undefined' || arrg[0] == '0') {
                document.querySelector(output).textContent = "0,00 R$";
            } else {
                document.querySelector(output).textContent = arrg[0] + ',' + arrg[1] + ' R$';
            }

        })
    }

    lgtLimit(target) {
        const input = document.querySelector(target)
        input.addEventListener('input', () => {
            let regexLimit = /^[0-9]{0,2}?$/g;
            if (!regexLimit.test(input.value)) {
                let cut = input.value.replace(/[^\d]/g, "").match(/^[0-9]{0,2}/g);
                cut = cut ? cut[0] : "";

                input.value = cut;
            }
        })
    }

    incrementValue(start, input, price, output) {

    }

    decrementValue(start, input, price, output) {

    }

}