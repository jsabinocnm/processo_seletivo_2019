<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NoticiaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //busca
        $search = $request->get('search');
        $pagina = $request->get('pagina');

        $pesquisa = '';

        if ($search) {
            $pesquisa = '?pesquisa=' . $search;
        }

        $urlNoticias = 'http://www.marcha.cnm.org.br/webservice/noticias' . $pesquisa;

        try {
            $resultNoticias = @file_get_contents($urlNoticias);
        } catch (Exception $exc) {
            echo $exc();
        }

        $arrNoticias = json_decode($resultNoticias, true);
        $noticia = array();
        $contar = 0;
        $qtdPagina = 5;
        $atual = (isset($pagina)) ? intval($pagina) : 1;
        if (isset($arrNoticias['noticias'])) {
            $pagArquivo = array_chunk($arrNoticias['noticias'], $qtdPagina);
            $contar = count($pagArquivo);
            $resultado = $pagArquivo[$atual - 1];
            foreach ($resultado as $key => $noticias) {
                $newTexto = $this->limitaTextoNoticia($noticias["texto"]);
                $resultado[$key]["texto"] = utf8_encode($newTexto);
            }
            $noticia = $resultado;
        }

        return view('noticias.index', ['noticia' => $noticia, 'search' => $search, 'contar' => $contar, 'atual' => $atual]);
    }

    function limitaTextoNoticia($string, $words = '300') {
        $string = strip_tags($string);
        $cont = strlen($string);
        if ($cont <= $words) {
            return $string;
        } else {
            $strpos = strrpos(substr($string, 0, $words), ' ');
            return substr($string, 0, $strpos) . '...';
        }
    }

}
