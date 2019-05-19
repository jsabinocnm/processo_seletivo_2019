{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Desafio - 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content=""/>
        <meta name="robots" content="index, follow" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.png">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{url("assets/css/geral.css")}}">
        <script src="{{url("assets/js/jquery-3.2.1.slim.min.js")}}"></script>
    </head>
    <body>
        <div class="container">
            <div style="height: 20px;"></div>
            @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
            @endif 
            <div class="container">                
                @include ('errors.list') {{-- Including error file --}}
            </div>
            <div style="height: 20px;"></div>
            <div class="container">
                <div class="col-md-12" style="min-height: 630px;">
                    @yield('content')
                </div>
            </div>
            <div style="height: 20px;"></div>
        </div>
    </body>
</html>
<script src="{{url("assets/js/jquery-3.2.1.slim.min.js")}}"></script>
<script src="{{url("assets/js/popper.min.js")}}"></script>
<script src="{{url("assets/js/bootstrap.min.js")}}"></script>