
//Script para generar ventana popup al hacer click en una fila de las tablas con clase clickable-row (ejemplo: pacientes y empleados)
$(document).ready(function($) {
        $(".clickable-row").click(function() {
            var left  = ($(window).width()/2)-(900/2),
            top   = ($(window).height()/2)-(600/2),
            popup = window.open ($(this).data("href"), "popup", "width=900, height=600, top="+top+", left="+left);
            // window.open($(this).data("href"),'_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        });
    });
 
 //	Script para el sort dinámico de las tablas del sistema. 
 $(document).ready(function(){
     $('#tablaSort').DataTable({
         "language": {
             "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
         }
     });
 });
 
 