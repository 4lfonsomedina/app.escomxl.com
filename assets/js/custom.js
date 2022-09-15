$(document).ready(function() {


	$(".data_table_1").DataTable({
        "order": [[ 0, "desc" ]],
        language: {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
          },
          "fnInitComplete": function() { $(".data_table_1").show(); },
      });


	$(document).on("click",".aw_loader",function(){
        $("#div_load_page").html(loader());
        $("#div_load_page").fadeIn(500);
    })

    
});







function loader() {
    var loader = "<div class='col col-lg-12 loader_ocu'><div class='spinner'>" + "<div class='rect1'>" + "</div><div class='rect2'>" + "</div><div class='rect3'>" + "</div><div class='rect4'>" + "</div><div class='rect5'>" + "</div></div></div>";
    return loader;
}
function loader_xs() {
    var loader = "<div class='col col-lg-12 loader_ocu' style='width:50px; height:12px'><div class='spinner' style='width:50px; height:12px'>" + "<div class='rect1'>" + "</div><div class='rect2'>" + "</div><div class='rect3'>" + "</div><div class='rect4'>" + "</div><div class='rect5'>" + "</div></div></div>";
    return loader;
}