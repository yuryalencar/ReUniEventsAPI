<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="col-lg-6 col-sm-12">
            <p class="text-left"><b>Prezado(a), {{$person->name}}</b></p>
            <p>Renove seu token de acesso e continue publicando seus eventos no ReUni. </p>
        </div>

        <div class="col-lg-6 col-sm-12">
            <p>
                <b>Por que isso acontece ?</b>
            </p>

            <p> É uma medida de segurança do Facebook para te manter seguro. Assim sempre que trocar de senha, ou
                o Facebook achar que existe alguma brecha de segurança ele irá requisitar um novo token.</p>
        </div>

        <div class="col-lg-6 col-sm-12">
            <p>
                <b>Como renovo ?</b>
            </p>

            <p> Basta entrar novamente no site do ReUni, logar e clicar em renovar meu token. Fácil né ? ;)</p>
        </div>

        {{--        <div class="links">--}}
        {{--            <a href="https://laravel.com/docs">Docs</a>--}}
        {{--            <a href="https://laracasts.com">Laracasts</a>--}}
        {{--            <a href="https://laravel-news.com">News</a>--}}
        {{--            <a href="https://blog.laravel.com">Blog</a>--}}
        {{--            <a href="https://nova.laravel.com">Nova</a>--}}
        {{--            <a href="https://forge.laravel.com">Forge</a>--}}
        {{--            <a href="https://vapor.laravel.com">Vapor</a>--}}
        {{--            <a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--        </div>--}}
    </div>
</div>
</body>
</html>
