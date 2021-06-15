function suma(){
	var n1, n2, suma, salida;
	n1 = prompt('valor1 = ',0);
	n2 = prompt('valor2 = ',0);
	suma = parseInt(n1) + parseInt(n2);
	salida = document.getElementById("salida");
	salida.value += n1 +'+'+ n2+'=' +suma+'\n';
}

function resta(){
	var n1, n2, resta, salida;	
	n1 = prompt('valor1 = ',0);
	n2 = prompt('valor2 = ',0);
	resta = parseInt(n1) - parseInt(n2);
	salida = document.getElementById("salida");
	salida.value += n1+'-' +n2+'=' +resta+'\n';
}

function multiplicacion(){
	var n1, n2, mult, salida;
	n1 = prompt('valor1 = ',0);
	n2 = prompt('valor2 = ',0);
	mult = parseInt(n1) * parseInt(n2);
	salida = document.getElementById("salida");
	salida.value += n1+'*' +n2+'=' +mult+'\n';
}

function dividir(){
	var n1, n2, div, salida;
	n1 = prompt('valor1 = ',0);
	n2 = prompt('valor2 = ',0);
	div = parseInt(n1) / parseInt(n2);
	salida = document.getElementById("salida");
	salida.value +=n1 +'/' +n2+'=' +div+'\n';
}

function potencia(){
	var n1, n2, potencia, salida; 
	n1 = prompt('valor1 = ',0);
	n2 = prompt('valor2 = ',0);
	potencia = Math.pow(parseInt(n1),parseInt(n2));
	salida = document.getElementById("salida");
	salida.value += n1+'^' +n2+'=' +potencia+'\n';
}

function cuadrado(){
	var n1, cuadrado, salida; 
	n1 = prompt('valor1 = ',0);
	cuadrado = Math.pow(parseInt(n1),2);
	salida = document.getElementById("salida");
	salida.value += n1+'^'+2+'='+cuadrado+'\n';
}

function factorial(){
	var salida;
	var num = prompt("Introduce un número y se mostrará su factorial: ",0);
	var resultado = 1;
	var i;
	for(i = num; i > 0; i--) {
  		resultado = resultado * i;
	}
	salida = document.getElementById("salida");
	salida.value += 'factorial de '+' '+num+' = '+resultado+'\n';
}