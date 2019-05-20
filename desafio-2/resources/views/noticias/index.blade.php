<!doctype html>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="pt-br"> <!--<![endif]-->
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
        <link rel="stylesheet" href="assets/css/geral.css">
    </head>
    <body>
        <section class="conteudo-internas">
            <div class="centraliza">
                <div class="conteudo-esquerda">
                    <div class="lista"><!--Lista de Noticias-->
                        <form action="" method="get" class="form-group row">
                            <div class="col-12 busca">
                                <input type="text"  class="form-control col-8" name="search" placeholder="Digite sua busca" value="{{ $search }}">
                                <button class="btn btn-primary col-2"> Buscar </button>
                            </div>
                        </form>
                        @forelse ($noticia as $value) 
                        <article class="box-noticia"><!--Notícia-->
                            <a href="{{$value['url']}}" >
                                <figure>
                                    <img src="{{$value['imagem']}}" alt="" >
                                </figure>
                                <div class="texto-lista-noticias">
                                    <span class="data-lista-noticia">{{$value['data_formatada']}}</span>
                                    <h1>{{$value['titulo']}}</h1>
                                    <p>{{$value['texto']}}</p>
                                </div>
                            </a>
                        </article><!--Fim Notícia-->
                        @empty
                        <tr>
                            <td colspan="90">
                                Nenhum registro encontrado!
                            </td>
                        </tr>
                        @endforelse
                        <hr>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <ul class="pagination">
                                    @for($i = 1; $i <= $contar; $i++)
                                    @if($i == $atual)
                                    <li class="active page-item">
                                        <a class="page-link" href="?pagina={{ $i }}{{ $search ? '&search=' . $search : '' }}">{{ $i }}</a>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="?pagina={{ $i }}">{{ $i }}</a>
                                    </li>
                                    @endif
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <!--Fim Paginação-->
                    </div><!--Fim Lista de Noticias-->
                </div> <!-- final conteudo-esquerda -->
            </div> <!-- final centraliza -->
        </section>
    </body>
</html>