<template>
    <div class="row justify-content-center">
        <div v-bind:class="defineTamanho">
            <div class="card shadow mb-4">
                <div class="card-header py-3" v-if="titulo">
                    <h6 class="m-0 font-weight-bold text-primary">{{titulo}}</h6>
                </div>
                <div class="card-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','tamanho'],
        computed:{
            defineTamanho: function(){
                /* valor máximo */
                if(this.tamanho >= 12){ 
                    return `col-lg-12`;
                }
                /* valor mínimo */
                if(this.tamanho <= 2){
                    return `col-lg-2`;
                }
                /* valor par || ímpar */
                if((this.tamanho % 2) == 0 ){
                    return `col-lg-${this.tamanho}`;
                }else{
                    let tam=parseInt(this.tamanho)+1;
                    return `col-lg-${tam}`;
                }
                
                /* tamanho nao informado */
                return (`col-lg-${this.tamanho}` || `col-lg-12`);
            }
        }
      
    }
</script>

<!--
* OBSERVAÇÕES (PROPS):
*
*   1.titulo: Título do painel
*       . Se o Título nao for informado, o mesmo será removido
*
*   2.Tamanho: define o tamanho do painel (2 || 4 || 6 || 8 || 10 || 12)
*      . Se o tamanho for maior que o tamanho máximo(12), retornará 12
*      . Se o tamanho for menor que o tamanho mínimo (2), ele retorna tamanho 2
*      . Se o tamanho for um valor ímpar, ele soma 1. (tamanho+1)
*      . Se o tamanho nao for informado, será retornado o tamanho máximo
*
-->
