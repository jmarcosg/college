function numerosPares() {
    var i, resultado;

	for(i = 0; i < 500; i++){
		if (i % 2 == 0){ 
            resultado = i+" ";
			document.getElementById('par').innerHTML += resultado+" ";
		}
	}
}