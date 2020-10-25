$( document ).ready(function() {
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
    
