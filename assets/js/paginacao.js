$(document).ready(function() {
    $('#tabela').dataTable({
        "oLanguage": {
            "sProcessing": "Aguarde enquanto os dados são carregados ...",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": " ",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Posterior",
                "sLast": "Último"
            }
        }
    }
    );
}
);

//1ºcoluna oculta
$(document).ready(function() {
    $('#tabela2').dataTable({
        "oLanguage": {
            "sProcessing": "Aguarde enquanto os dados são carregados ...",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": " ",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Posterior",
                "sLast": "Último"
            }
        },
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": true /*pesquisar nas colunas ocultas*/
            }
        ]

    }
    );
}
);


//ordenar decrescente por data, e primeira coluna oculta
$(document).ready(function() {
    $('#tabela3').dataTable({
        "order": [[0, "desc"]],
        "oLanguage": {
            "sProcessing": "Aguarde enquanto os dados são carregados ...",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": " ",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Posterior",
                "sLast": "Último"
            }
        },
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": true
            }
        ]

    }
    );
} 
);


//ordenar decrescente por data, e primeira coluna oculta
$(document).ready(function() {
    $('#tabela4').dataTable({
        aaSorting: [],
         //"order": [[2, "desc"]],
        "oLanguage": {
            "sProcessing": "Aguarde enquanto os dados são carregados ...",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": " ",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Posterior",
                "sLast": "Último"
            }
        }

    }
    );
} 
);
