function alumnosAjax(url){
    var b = $("#buscar").val();
    $.post(url,{buscar:b},function(data){
        $("#alumnosAjax").html(data);
    });
}

function matriculasAjax(url){
    var b = $("#buscar").val();
    $.post(url,{buscar:b},function(data){
        //alert(data);
        $("#matriculaAjax").html(data);
    });
}

function serviciosAjax(url){
    var b = $("#servicio").val();
     alert(b);
    $.post(url,{buscar:b},function(data){
        //alert(data);
        $("#servicioAjax").html(data);
    });
}

function serviciosEspecialidad(url){
    var a = $("#alumno").val();
    $.post(url,{alumno:a,tipo:"alumno"},function(data){
        $("#servicio").html(data);
        $(".chosen-select").trigger("chosen:updated");
        servicioCosto(url)
    });
}
function servicioCosto(url){
    var id = $("#servicio").val();
    $.post(url,{id:id,tipo:"costo"},function(d){
        $("#costo").val(d.precio);
        $("#nomc").val(d.concepto);
    });
}

function cargarServicioTabla(url){
    var f = document.getElementById("cargar-servicio");
    if (f.checkValidity()) {
        var id = $("#servicio").val();
        var mat = $("#alumno").val();
        var concepto = $("#nomc").val();
        var cantidad = $("#cantidad").val();
        var precio = $("#costo").val();
        var descuento = $("#descuento").val();
        var  fecha = $("#fechaps").val();
        var descripcion = $("#descripcion").val();
        var tipo = $("#tipo").val();
        $.post(url,{alumno:mat,tipo:tipo,id:id,concepto:concepto,cantidad:cantidad,precio:precio,descuento:descuento,fecha:fecha,descripcion:descripcion},function(d){
            $("#carrito").html(d);
        });    
    }
    return false;
}

function mostrar_tabla_virtual(url){
    $.get(url,function(d){
        $("#carrito").html(d);
    });
}
function eliminarServCarrito(url){
    var r = confirm("¿Desea eliminar el servicio?");
    if(r)
        $.get(url,function(d){
            $("#carrito").html(d);
        });

}

function cancelarCarrito(url){
    var r = confirm("¿Desea Cancelar la operación?");
    if(r)
        $.get(url,function(d){
            $("#carrito").html(d);
        });   
}