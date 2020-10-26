$(document).ready(function () {
    var temdatatable = $('body').find(".table_datatable").length;
    if (temdatatable != 0) {
        // $.noConflict();
        // $('.table_datatable').DataTable();
        var table = $('.table_datatable').DataTable({
            "scrollX": false,
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "columnDefs": [
                { orderable: true, targets: [0] }
            ],


            "lengthMenu": [10, 25, 50, 75, 100, 500, 1000],
            "order": [[0, "desc"]],// ordenação


            "oLanguage": {// tradução idioma

                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "<label>Mostrando de _START_ até _END_ de _TOTAL_ registros</label>",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sClass": "table",
                "sInfoThousands": ".",
                "sLengthMenu": "<label class='pr-3'>Exibir _MENU_ por página</label>",
                "sSearchPlaceholder": "Buscar...",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": '<div class="border" style="border-radius:0px 4px 4px 0px;"> _INPUT_ <div class="btn btn-primary" ><i class="fas fa-search fa-sm" style="vertical-align: center;"></i></div></div>',
                "oPaginate": {
                    "sNext": '<span class="pagination-fa"><i class="fas fa-forward" ></i></span>',
                    "sPrevious": '<span class="pagination-fa"><i class="fas fa-backward" ></i></span>',
                    "sFirst": "Primeira",
                    "sLast": "Última"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
            },



        });

    }// fim if
});


function moeda(a, e, r, t) {
    let n = ""
        , h = j = 0
        , u = tamanho2 = 0
        , l = ajd2 = ""
        , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "0" + r + "0" + l),
        2 == u && (a.value = "0" + r + l),
        u > 2) {
        for (ajd2 = "",
            j = 0,
            h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
                j = 0),
                ajd2 += l.charAt(h),
                j++;
        for (a.value = "",
            tamanho2 = ajd2.length,
            h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}

function buscarItens() {
    $.ajax({
        url: url + '/buscaItens',
        dataType: 'json',
        type: 'get',
        success: function (result) {
            // console.log(result)
            $('#idItem').html('').append(`
                 <option value="">selecione...</option>
           `)
            var listaItens = new Promise(
                function (resolve, reject) {
                    result.map((item) => {
                        $(`#idItem`).append(`
                  <option value="${item._id}">${item.nome}</option>  
              `)
                    })
                }
            );

            listaItens.then($(`#idItem`).chosen({ placeholder_text_single: 'selecione...' }))
            listaItens.catch(
                setTimeout(() => {
                    $(`#idItem`).chosen({ placeholder_text_single: 'selecione...' })
                }, 2000)
            )
            
        },
        error: function (jqXHR) {
            var msg = '';
            if (jqXHR.error === 0) {
                msg = 'Not connect.\n Verify Network.';//Sem conexão
            } else if (jqXHR.error === 404) {
                msg = 'Requested page not found. [404]';//não encontrou no servidor
            } else if (jqXHR.error === 401) {
                msg = 'Requested page not found. [401]';//não encontrou no servidor
            } else if (jqXHR.error === 500) {
                msg = 'Internal Server Error [500].';//erro interno do servidor
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;//qualquer erro adicional
            }
            if (msg != "")
                alert("Erro na busca!", msg);
        }//fecha error
    })//fim ajax
}

function calculaTotal() {
    alert('chamou')
}
