@extends('layouts.app')

@section('content')
    <pagina tamanho="10">

        @if ($errors->all())
            <div class="alert alert-danger alert-dissmissible text-center" role="alert">
                <button type="button" class="close" data-dissmiss="alert" arial-label="Close" name="button"><span aria-hidden></span></button>
                @foreach ($errors->all() as $key => $value)
                    <li>{{$value}}</li>
                @endforeach
            </div>
        @endif
        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <tabela-lista
            v-bind:titulos="['#','Titulo','Descrição','Autor','data']"
            v-bind:itens="{{json_encode($listaArtigos)}}"
            ordem="desc" ordemcol="0"
            criar="#criar" detalhe="/blog/public/admin/artigos/"
            editar="/blog/public/admin/artigos/"
            deletar="/blog/public/admin/artigos/"
            token="{{csrf_token()}}"
            modal="sim"
            ></tabela-lista>
            <div class="" align="center">
                {{$listaArtigos}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título" value={{old('titulo')}}>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição" value={{old('descricao')}}>
            </div>
            <div class="form-group">
                <label for="addConteudo">Conteúdo</label>

                <ckeditor
                    id="addConteudo"
                    name="conteudo"
                    value="{{old('conteudo')}}"
                    v-bind:config="{
                        toolbar: [
                        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                        ],
                        height: 200
                    }" >
                </ckeditor>

            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" value={{old('data')}}>
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Salvar</button>
        </span>
    </modal>
    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" v-bind:action="'/blog/public/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="editConteudo">Conteúdo</label>
                <textarea id="" name="editConteudo" class="form-control" v-model="$store.state.item.conteudo"></textarea>
                <ckeditor
                    id="editConteudo"
                    name="conteudo"
                    v-model="$store.state.item.conteudo"
                    v-bind:config="{
                        toolbar: [
                          [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                        ],
                        height: 200
                    }">
                </ckeditor>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" v-model="$store.state.item.data">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
        </painel>
    </modal>
    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
        <p>@{{$store.state.item.conteudo}}</p>
    </modal>
@endsection
