<template>
    <div v-bind:class="'col-sm-'+(sm || '6') + ' col-md-'+(md || '4')">
        <div class="thumbnail">
            <img src="http://lavras.tv/site/wp-content/uploads/2017/10/tecnologia.jpg" alt="...">
            <div class="caption">
                <small>{{data | formataData}} - {{autor}}</small>
                <h3>{{titulo}}</h3>
                <p>{{descricao}}</p>
                <p><a v-bind:href="link" class="btn btn-primary" role="button">Leia</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo', 'descricao', 'link', 'img', 'data', 'autor', 'sm', 'md'],
        filters:{
            formataData: function(value){
                if(!value) return '';
                value = value.toString();
                value = value.split('-');
                return value[2]+'/'+value[1]+'/'+value[0];
            }
        }
    }
</script>
