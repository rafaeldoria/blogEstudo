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
        <painel titulo="Lista de Usuários">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <tabela-lista
            v-bind:titulos="['#','Nome','Email']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            ordem="asc" ordemcol="1"
            criar="#criar" detalhe="/blog/public/admin/usuarios/"
            editar="/blog/public/admin/usuarios/"
            deletar="/blog/public/admin/usuarios/"
            token="{{csrf_token()}}"
            modal="sim"
            ></tabela-lista>
            <div class="" align="center">
                {{$listaModelo}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="autor">E-mail</label>
                <select class="form-control" id="autor" name="autor">
                    <option {{old('autor') && old('autor' == 'N' ? 'selected' : '')}} value="N">Não</option>
                    <option {{old('autor') && old('autor' == 'S' ? 'selected' : '')}} {{!old('autor') ? 'selected' : ''}} value="S">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Salvar</button>
        </span>
    </modal>
    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" v-bind:action="'/blog/public/admin/autores/' + $store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <select class="form-control" id="autor" name="autor" v-model="$store.state.item.autor">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value={{old('password')}}>
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
        </painel>
    </modal>
    <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
        <p>@{{$store.state.item.email}}</p>
    </modal>
@endsection
