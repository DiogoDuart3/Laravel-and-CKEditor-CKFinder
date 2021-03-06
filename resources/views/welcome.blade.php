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
        html,
        body {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>


    </div>
</div>

<div class="container">

    <div id="test">
        <h1>Isto é um teste</h1>
        <div class="row">
            <div class="col-6">
                Esquerda
            </div>
            <div class="col-6">
                Direita
            </div>
        </div>
    </div>

    <textarea class="form-control" id="editor1" name="summary-ckeditor">
                <h1>Isto é um teste</h1>
                <div class="row">
                    <div class="col-6">
                        Esquerda
                    </div>
                    <div class="col-6">
                        Direita
                    </div>
                </div>
            </textarea>
    <button onclick="aplica();">Aplica</button>
</div>


@include('ckfinder::setup')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
<script>
    var editor = CKEDITOR.replace('editor1', {
        // Use named CKFinder browser route
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        enterMode: CKEDITOR.ENTER_BR,
        // Use named CKFinder connector route
        filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files',
    });
    CKEDITOR.addStylesSet('default',
        [
            {name: 'Botão Primario', element: 'a', attributes: {'class': 'btn btn-primary'}},
            {name: 'Botão Sucesso', element: 'a', attributes: {'class': 'btn btn-success'}},
            {name: 'Botão Perigo', element: 'a', attributes: {'class': 'btn btn-danger'}}],
    );
    CKFinder.setupCKEditor(editor);
</script>

<script>
    function aplica() {
        $('#test').html(CKEDITOR.instances['editor1'].getData());
    }

    setTimeout(aplica(), 2000)
</script>

</body>

</html>