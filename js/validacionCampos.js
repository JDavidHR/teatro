//Funcion para validar campos que solo ingrese numeros
function solonumeros(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    //Numeros que solo se permiten
    numero = "01234567789";
    //Teclas especiales
    especiales = "8-37-38-46";
    teclado_especial = false;
    for(var i in especiales){
        if(key == especiales[i]){
            teclado_especial = true;
        }
    }
    if(numero.indexOf(teclado) == -1 && !teclado_especial){
        return false;
    }
}
//Funcion para ingresar solo letras
function sololetras(e) {
        //Evento de codigo de tecla
	key=e.keyCode || e.which; 
	teclado=String.fromCharCode(key).toLowerCase();
        //Letras que solo se permiten
	letras="qwertyuiopasdfghjklñzxcvbnmáéíóú ";
        //Teclas especiales
	especiales="8-37-38-46-164";
	teclado_especial=false;
        //For para verlas teclas especiales
	for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
			break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
		return false;
	}
}

function validarEmail(elemento){

  var texto = document.getElementById(elemento.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      document.getElementById("resultado").innerHTML = "Correo invalido";
  } else {
    document.getElementById("resultado").innerHTML = "";
  }

}
