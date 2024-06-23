<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resposta ao seu contato - Suky Sorveteria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #333333;
        }
        .content p {
            color: #666666;
            line-height: 1.6;
        }
        .content blockquote {
            border-left: 4px solid #eeeeee;
            margin: 10px 0;
            padding-left: 10px;
            color: #999999;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #999999;
            background-color: #f4f4f4;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #999999;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('img/logo_suky.png') }}" alt="Logo da Suky Sorveteria">
        </div>
        <div class="content">
            <p>Olá, <strong>{{ $contato->nomeContato }}</strong></p>
            <p>Agradecemos por entrar em contato conosco. Recebemos sua mensagem e estamos felizes em poder ajudar:</p>
            <blockquote>
                <p><strong>Assunto:</strong> {{ $contato->assuntoContato }}</p>
                <p><strong>Mensagem:</strong> {{ $contato->mensagemContato }}</p>
            </blockquote>
            <p>Aqui está a nossa resposta para você:</p>
            <blockquote>
                <p><strong>Resposta:</strong> {{ $resposta->mensagem_resposta }}</p>
            </blockquote>
            <p>Se tiver mais alguma dúvida ou precisar de mais alguma coisa, por favor, não hesite em nos contatar. 😊</p>
            <p>Atenciosamente,</p>
            <p>{{ $resposta->nome_administrador }} | {{ ucfirst($resposta->tipo_administrador) }} da Suky </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Suky Sorveteria. Todos os direitos reservados.</p>
            <p>
                <a href="https://ascensaodev.smpsistema.com.br/sorveteria">Visite nosso site</a> |
                <a href="mailto:codeforgegroup@gmail.com">sukysorveteria@gmail.com</a>
            </p>
            <p>Av. Rosária - Vila Rosaria, São Paulo - SP, 08021-070</p>
        </div>
    </div>
</body>
</html>
