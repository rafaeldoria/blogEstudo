@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="ARTIGOS">
            <div class="row">
                @foreach ($lista as $key => $value)
                    <artigo-card
                    titulo="{{$value->titulo}}"
                    descricao="{{$value->descricao}}"
                    link="#"
                    img="http://lavras.tv/site/wp-content/uploads/2017/10/tecnologia.jpg"
                    data="{{$value->data}}"
                    autor="{{$value->autor}}"
                    sm="6"
                    md="4"
                    >
                    </artigo-card>
                @endforeach
            </div>
            <div class="" align="center">
                {{$lista}}
            </div>
        </painel>
    </pagina>
@endsection
