{{-- \resources\views\errors\401.blade.php --}}


@section('content')
<div style="height: 150px;"></div>
<div class="container">
    <div class="text-center">
        <h1 class="">
            <i class="fa  fa-lock"></i>&nbsp; Acesso Negado
        </h1>
        <div style="height: 20px;"></div>
        <p>Desculpe, você não está autorizado a acessar a página que solicitou.</p>
        <p>Se você acha que isso é um engano, entre em contato com a gente.</p>
        <br>
        <p>Stênio</p>
        <p><a href="mailto:xstenio@gmail.com?subject=Permissao" class="text-primary">xstenio@gmail.com</a></p>
        <p>(61) 98518-8264</p>
        <br/><br/>
        <a href="javascript:history.back()" class="btn  btn-primary">Voltar para onde estava</a>
    </div>
</div>  
@endsection
