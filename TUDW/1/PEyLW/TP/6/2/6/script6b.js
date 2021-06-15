function valorSeleccionado(){
	var valor;
	valor = prompt('Ingrese un valor: ',0);
	if (valor < 0) {
		alert('-1');
	}else if ((valor >= 0) & (valor < 10)) {
		alert('0');
	}else if ((valor >= 10) & (valor < 50)) {
		alert('1');
	}else if ((valor >= 50) & (valor < 100)) {
		alert('2');
	}else {
		alert('3');
	}
}