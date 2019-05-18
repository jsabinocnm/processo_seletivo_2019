$(document).ready(function () {
    $('#myTable').DataTable({
        "language": {
            "decimal": "",
            "emptyTable": "Sem dados disponíveis",
            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
            "infoFiltered": "(filtrado de MAX registros no total)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registos",
            "loadingRecords": "A carregar dados...",
            "processing": "A processar...",
            "search": "Procurar:",
            "zeroRecords": "Não foram encontrados resultados",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Seguinte",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": clique para ordenar ascendente (ASC)",
                "sortDescending": ": clique para ordenar descendente (DESC)"
            }
        }
    });

});



