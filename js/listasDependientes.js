$(document).ready(function(){
    //Cargo los datos del select departamento
    $('#departamento').on('change', function(){
        //Pregunto que si el select departamento esta vacio
    if($('#departamento').val() == ""){
        //Vacio el select de ciudad
	$('#ciudad').empty();
        //mando el valor de ciudad
	$('<option value = "">Selecciona una ciudad</option>').appendTo('#ciudad');
        //Desactivo los campos de ciudad 
	$('#ciudad').attr('disabled', 'disabled');
    }else{
        //Remuevo los atributos de desactivado
	$('#ciudad').removeAttr('disabled', 'disabled');
        //Cargo los valores del id departamento
	$('#ciudad').load('municipiosGet.php?id_departamento=' + $('#departamento').val());
	}
    });
});

