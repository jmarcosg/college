function resultados() {
    var i, resultado;
		for(i = 0; i < 100; i++){
			resultado = ((3 * i) + 5 - (Math.pow(i,2)));
			document.getElementById('numero').innerHTML += resultado+' ';
		}
}