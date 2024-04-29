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
