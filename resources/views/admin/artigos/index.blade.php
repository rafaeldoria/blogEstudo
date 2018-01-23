@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <tabela-lista
            v-bind:titulos="['#','Titulo','Descrição','data']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="asc" ordemcol="1"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="798465132"
            modal="sim"
            >
            </tabela-lista>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea id="conteudo" name="conteudo" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" >
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Salvar</button>
        </span>
    </modal>
    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" action="#" method="put" enctype="" token="123456">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="descrição">Descrição</label>
                <input type="text" class="form-control" id="descrição" name="descrição" v-model="$store.state.item.descricao" placeholder="Descrição">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
        </painel>
    </modal>
    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
    </modal>
@endsection
