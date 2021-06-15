  
function calcularEdad(){
	var dianacimiento,mesnacimiento,anionacimiento,diaactual,mesactual,anioactual,edad;
	dianacimiento = prompt('ingrese el dia que nacio: ',"");
	mesnacimiento = prompt('ingrese el mes que nacio: ',"");
    anionacimiento = prompt('ingrese el año de nacimiento: ',"");
    diaactual = prompt('ingrese el dia actual: ',"");
    mesactual = prompt('ingrese el mes actual: ',"");
    anioactual = prompt('ingrese el año actual: ',"");

	if(dianacimiento >= diaactual && mesnacimiento >= mesactual) {
		edad = parseInt(anioactual) - parseInt(anionacimiento);
		document.write("Su edad es: "+edad);
	}else {
		edad = (parseInt(anioactual) - parseInt(anionacimiento) - 1);
		document.write("Su edad es: "+edad);
	}
}