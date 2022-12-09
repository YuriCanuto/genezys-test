const input = document.querySelector('#zipcode')

if (input) {
    input.addEventListener('blur', function (e) {
        const zipcode = e.target.value
        const validacep = /^[0-9]{8}$/;
        clearErros()
        if (validacep.test(zipcode)) {
            clearFields()
            axios.get(`https://viacep.com.br/ws/${zipcode}/json/`)
                .then(function (response) {
                    if(response.data.erro) {
                        insertAfter(errorMessage('CEP inválido.'), input)
                    } else {
                        setFields(response.data)
                    }
                })
                .catch(function (error) {
                    insertAfter(errorMessage('Formato de CEP inválido.'), input)
                })
        } else {
            insertAfter(errorMessage('Formato de CEP inválido.'), input)
        }
    })
}

function clearFields() {
    document.getElementById('street').value = "";
    document.getElementById('neighborhood').value = "";
    document.getElementById('city').value = "";
    document.getElementById('state').value = "";
}

function clearErros() {
    input.classList.remove('is-invalid')
    const el = document.querySelector('.zipcode-error')
    if (el) el.remove()
}

function setFields(data) {
    document.getElementById('street').value = data.logradouro;
    document.getElementById('neighborhood').value = data.bairro;
    document.getElementById('city').value = data.localidade;
    document.getElementById('state').value = data.uf;
}

function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

function errorMessage(text) {
    input.classList.add('is-invalid')
    return document.createRange().createContextualFragment(`<span class="invalid-feedback zipcode-error" role="alert">
                <strong>${text}</strong>
            </span>`);
}
