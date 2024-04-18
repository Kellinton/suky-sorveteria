// #region global
(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        }
    });


   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);

// #endregion global

// #region mudanças

// document.getElementById("removerDoCarrinho").addEventListener("click", function() {
//     // Aqui você pode inserir o código para remover o item do carrinho
//     var itemDoCarrinho = document.getElementById("itemCarrinho");
//     itemDoCarrinho.parentNode.removeChild(itemDoCarrinho);
// });

// Seleciona todos os itens do carrinho
const itensCarrinho = document.querySelectorAll(".itemCarrinho");

// Restaura o estado do carrinho ao carregar a página
document.addEventListener("DOMContentLoaded", restaurarCarrinho);

// Adiciona um ouvinte de evento de clique a cada item do carrinho
itensCarrinho.forEach(function(item) {
    // Verifica o estado do item e configura a visibilidade
    const estado = localStorage.getItem("item_" + item.id);
    if (estado === "removido") {
        item.style.display = "none";
    }

    item.addEventListener("click", function() {
        // Alterna o estado do item
        if (item.style.display !== "none") {
            item.style.display = "none";
            localStorage.setItem("item_" + item.id, "removido");
        } else {
            item.style.display = "";
            localStorage.setItem("item_" + item.id, "nao_removido");
        }
    });
});

// Função para restaurar o estado do carrinho a partir do armazenamento local
function restaurarCarrinho() {
    // Percorre todos os itens do carrinho
    itensCarrinho.forEach(function(item) {
        // Restaura o estado do item com base no armazenamento local
        const estado = localStorage.getItem("item_" + item.id);
        if (estado === "removido") {
            item.style.display = "none";
        }
    });
}

// function adicionarAoCarrinho(nome, preco) {
//     // Cria um objeto representando o item
//     const item = {
//         nome: nome,
//         preco: preco
//     };

//     // Recupera o carrinho do armazenamento local ou cria um novo array se não existir
//     let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

//     // Adiciona o item ao carrinho
//     carrinho.push(item);

//     // Salva o carrinho de volta no armazenamento local
//     localStorage.setItem("carrinho", JSON.stringify(carrinho));

//     // Redireciona o usuário para a página do carrinho
//     const carrinhoUrl = document.querySelector('meta[name="carrinho-url"]').getAttribute('content');
//     window.location.href = carrinhoUrl;
// }

function adicionarAoCarrinho(nome, preco) {
    // Cria um objeto representando o item
    const item = {
        nome: nome,
        preco: preco
    };

    // Adiciona o item ao carrinho
    adicionarItemAoCarrinho(item);
}

function adicionarItemAoCarrinho(item) {
    // Cria um elemento HTML para representar o item no carrinho
    const novoItemHTML = `
        <div class="item-carrinho">
            <p>${item.nome} - R$${item.preco}</p>
        </div>
    `;

    // Adiciona o novo item ao carrinho
    const carrinho = document.getElementById('carrinho');
    carrinho.insertAdjacentHTML('beforeend', novoItemHTML);

}



// #endregion mudanças
