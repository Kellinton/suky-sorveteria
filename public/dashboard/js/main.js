// Filtrar itens (Dashboard)

 // Filtro do menu de itens

 document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.filtro-btn-menu button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {


            // Remove a classe 'filtro-ativo' de todos os botões
            buttons.forEach(btn => btn.classList.remove('filtro-ativo'));

            // Adiciona a classe 'filtro-ativo' ao botão clicado
            button.classList.add('filtro-ativo');

            // Obtém a categoria do botão clicado
            const categoria = button.getAttribute('data-categoria');

            // Filtra os cards com base na categoria
            filtrarCardapio(categoria);
        });
    });
});

function filtrarCardapio(categoria) {
    const produtosContainer = document.getElementById('produtos-container');
    const cards = produtosContainer.getElementsByClassName('produto-filtrar');

    for (const card of cards) {
        const categoriaProduto = card.getAttribute('data-categoria');

        if (categoria === 'todos' || categoria === categoriaProduto) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }

    }
}


// Formulário de contato do site

function showAlert(mensagem, targetElementId, timeout = 3000) {
    var messageDiv = document.getElementById(targetElementId);
    messageDiv.innerHTML = mensagem;
    messageDiv.classList.remove('msgContato');

    setTimeout(function() {
        messageDiv.classList.add('msgContato');
    }, timeout);
}

function displayError(erros) {
    let todosOsErros = "";

    for (const [key, value] of Object.entries(erros)) {
        todosOsErros += `<div class="alert alert-danger">${value.join(", ")}</div>`;
    }

    if (todosOsErros) {
        showAlert(todosOsErros, "contatoMensagem");
    }
}

function formContato(e){
    e.preventDefault();
    // e.stopPropagation();

     // Validar os campos do formulário
     var nomeContato = document.getElementById('nomeContato').value.trim();
     var emailContato = document.getElementById('emailContato').value.trim();
     var foneContato = document.getElementById('foneContato').value.trim();
     var assuntoContato = document.getElementById('assuntoContato').value.trim();
     var mensagemContato = document.getElementById('mensagemContato').value.trim();

     var camposVazios = [];

    if (!nomeContato) {
        camposVazios.push("Nome");
    }
    if (!emailContato) {
        camposVazios.push("Email");
    }
    if (!foneContato) {
        camposVazios.push("Telefone");
    }
    if (!assuntoContato) {
        camposVazios.push("Assunto");
    }
    if (!mensagemContato) {
        camposVazios.push("Mensagem");
    }

    if (camposVazios.length > 0) {
        showAlert(`<div class="alert alert-danger">Por favor, preencha os seguintes campos: ${camposVazios.join(', ')}.</div>`, "contatoMensagem");
        return; // Impede o envio do formulário se algum campo estiver vazio
    }


    var data = {
        nomeContato : document.getElementById('nomeContato').value,
        emailContato : document.getElementById('emailContato').value,
        foneContato : document.getElementById('foneContato').value,
        assuntoContato : document.getElementById('assuntoContato').value,
        mensagemContato : document.getElementById('mensagemContato').value
    };






    fetch('/contato/enviar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(errorData => {
                throw errorData;
            });
        }
        return response.json();
    })
    .then((data) => {
        if (data.success) {
            showAlert(
                `<div class="alert alert-success">${data.success}</div>`,
                 "contatoMensagem"
            );
            document.getElementById('formContato').reset();
        } else{
            showAlert(
                `<div class="alert alert-danger">Erro ao enviar email.</div>`,
                "contatoMensagem"
            );
        }
    })
    .catch(error => {
        let errorMessage = "Erro desconhecido";

        if (error.errors) {
            // Se houver erros de validação, exiba cada mensagem de erro
            errorMessage = Object.values(error.errors).flat().join('<br>');
        } else if (error.message) {
            // Se houver uma mensagem de erro geral, exiba essa mensagem
            errorMessage = error.message;
        }

        showAlert(
            `<div class="alert alert-danger">${errorMessage}</div>`,
            "contatoMensagem"
        );
    });
}
