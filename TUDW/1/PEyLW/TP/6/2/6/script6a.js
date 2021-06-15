function datos(){
	var contrasenia;
	contrasenia = prompt('Ingrese la contraseña: ',0);
	
	if (contrasenia === 'minombre'){
		document.write("Datos Personales </br> Nombre: Juan Marcos </br> Apellido: Gonzalez </br> Estado civil: Soltero </br> Edad: 27 </br> Fecha de Nacimiento: 14/01/1994 </br> DNI: ----");
	}else {
		document.write("Contraseña incorrecta");
	}
}