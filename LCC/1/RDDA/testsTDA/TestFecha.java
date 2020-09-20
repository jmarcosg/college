package testsTDA;

import utiles.TecladoIn;

public class TestFecha {

	public static void menu() {
		// Modulo que muestra el menu de opciones a realizar para el usuario
		System.out.println("________________________");
		System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
		System.out.println("");
		System.out.println("0. Terminar programa.");
		System.out.println("1. Calcular la cantidad de días transcurridos en el año.");
		System.out.println("2. Verificar si una fecha es anterior a otra. ");
		System.out.println("3. Calcular la fecha.");
		System.out.println("4. Indicar si el año es bisiesto.");
		System.out.println("");
		System.out.println("________________________");
		System.out.println("");
		System.out.print("Ingrese una opcion a realizar: ");
	}

	public static void main(String[] args) {
		// Algoritmo ppal
		// Declaracion e inicializacion de variables
		int opcion;
		int diaBuscado = 0, mesBuscado = 0, anioBuscado = 0, cantDias = 0;
		boolean esBisiesto;

		// Menu de opciones
		do {
			menu();
			opcion = TecladoIn.readInt();
			switch (opcion) {
			case 0:
				System.out.println("Se ha cerrado el calendario.");
				break;
			case 1:
				System.out.println("Usted ingreso la opcion 1.");
				System.out.println("Calcular cantidad de dias transcurridos en un año.");
				System.out.println("Ingrese el dia: ");
				diaBuscado = TecladoIn.readInt();
				System.out.println("Ingrese el mes en numeros: ");
				mesBuscado = TecladoIn.readInt();
				System.out.println("Ingrese el año: ");
				anioBuscado = TecladoIn.readInt();
				esBisiesto = anioBisiesto(anioBuscado);
				cantDias = diasTranscurridos(diaBuscado, mesBuscado, esBisiesto);
				System.out.println("Para la fecha ingresada han transcurrido: " + cantDias + " dias.");
				break;
			case 2:
				System.out.println("Usted ingreso la opcion 2.");
				System.out.println("Verificar si una fecha es anterior a otra.");
				fechaAnterior();
				break;
			case 3:
				System.out.println("Usted ingreso la opcion 3.");
				System.out.println("Indicar que fecha es.");
				System.out.println("Ingrese una cantidad de dias: ");
				cantDias = TecladoIn.readInt();
				System.out.println("Ingrese un año: ");
				anioBuscado = TecladoIn.readInt();
				esBisiesto = anioBisiesto(anioBuscado);
				calculaFecha(cantDias, anioBuscado, esBisiesto);
				break;
			case 4:
				System.out.println("Usted ingreso la opcion 4.");
				System.out.println("Indicar si el año es bisiesto.");
				System.out.println("Ingrese un año: ");
				anioBuscado = TecladoIn.readInt();
				esBisiesto = anioBisiesto(anioBuscado);

				if (esBisiesto) {
					System.out.println("El año ingresado es bisiesto.");
				} else {
					System.out.println("El año ingresado no es bisiesto.");
				}
				break;
			case 5:
				System.out.println("Calcular cuantos dias pasaron en el año.");
			}
		} while (opcion != 0);

		if (opcion == 0) {
			System.out.println("Programa finalizado.");
		}
	}

	public static void fechaAnterior() {
		// Modulo que compara fechas para luego mostrar cual es anterior a cual
		// Declaracion e inicializacion de variables
		int dia1 = 0, mes1 = 0, anio1 = 0;
		int dia2 = 0, mes2 = 0, anio2 = 0;

		// Ingreso y lectura de datos de la primer fecha
		System.out.println("Ingrese la primer fecha.");
		System.out.println("Ingrese el dia: ");
		dia1 = TecladoIn.readInt();
		System.out.println("Ingrese el mes en numeros: ");
		mes1 = TecladoIn.readInt();
		System.out.println("Ingrese el año: ");
		anio1 = TecladoIn.readInt();

		// Ingreso y lectura de datos de la segunda fecha
		System.out.println("Ingrese la segunda fecha.");
		System.out.println("Ingrese el dia: ");
		dia2 = TecladoIn.readInt();
		System.out.println("Ingrese el mes en numeros: ");
		mes2 = TecladoIn.readInt();
		System.out.println("Ingrese el año: ");
		anio2 = TecladoIn.readInt();

		// Muestro cual fecha es anterior a cual
		if ((dia1 < dia2) && (mes1 < mes2) && (anio1 <= anio2)) {
			System.out.println(dia1 + "/" + mes1 + "/" + anio1 + " es anterior a " + dia2 + "/" + mes2 + "/" + anio2);
		} else {
			System.out.println(dia2 + "/" + mes2 + "/" + anio2 + " es anterior a " + dia1 + "/" + mes1 + "/" + anio1);
		}

	}

	public static boolean anioBisiesto(int anio) {
		// Modulo que calcula si un año es bisiesto
		boolean esBisiesto = false;

		/*
		 * Para que sea bisiesto debe: 1) Ser divisible por 4 2) Si es divisible por 100
		 * no es bisiesto 2.1) Excepto si es divisible por 400
		 */

		if ((anio % 4 == 0)) {
			esBisiesto = true;
		}

		if ((anio % 100 == 0)) {
			esBisiesto = false;
		} else if ((anio % 400 == 0)) {
			esBisiesto = true;
		}

		return esBisiesto;
	}

	public static int diasTranscurridos(int dia, int mes, boolean esBisiesto) {
		// Modulo que calcula la cantidad de dias transcurridos en un a�o
		int totalDiasTranscurridos = 0;

		// Segun el mes y el a�o es bisiesto van a ser la cantidad de dias transcurridos
		switch (mes) {
		case 1:
			totalDiasTranscurridos = dia;
			break;
		case 2:
			if (esBisiesto) {
				totalDiasTranscurridos = 31 + dia;
			} else {
				totalDiasTranscurridos = 31 + dia;
			}
			break;
		case 3:
			if (esBisiesto) {
				totalDiasTranscurridos = 60 + dia;
			} else {
				totalDiasTranscurridos = 59 + dia;
			}
			break;
		case 4:
			if (esBisiesto) {
				totalDiasTranscurridos = 90 + dia;
			} else {
				totalDiasTranscurridos = 89 + dia;
			}
			break;
		case 5:
			if (esBisiesto) {
				totalDiasTranscurridos = 121 + dia;
			} else {
				totalDiasTranscurridos = 120 + dia;
			}
			break;
		case 6:
			if (esBisiesto) {
				totalDiasTranscurridos = 152 + dia;
			} else {
				totalDiasTranscurridos = 151 + dia;
			}
			break;
		case 7:
			if (esBisiesto) {
				totalDiasTranscurridos = 182 + dia;
			} else {
				totalDiasTranscurridos = 181 + dia;
			}
			break;
		case 8:
			if (esBisiesto) {
				totalDiasTranscurridos = 213 + dia;
			} else {
				totalDiasTranscurridos = 212 + dia;
			}
			break;
		case 9:
			if (esBisiesto) {
				totalDiasTranscurridos = 244 + dia;
			} else {
				totalDiasTranscurridos = 243 + dia;
			}
			break;
		case 10:
			if (esBisiesto) {
				totalDiasTranscurridos = 274 + dia;
			} else {
				totalDiasTranscurridos = 273 + dia;
			}
			break;
		case 11:
			if (esBisiesto) {
				totalDiasTranscurridos = 305 + dia;
			} else {
				totalDiasTranscurridos = 304 + dia;
			}
			break;
		case 12:
			if (esBisiesto) {
				totalDiasTranscurridos = 335 + dia;
			} else {
				totalDiasTranscurridos = 334 + dia;
			}
			break;
		}

		return totalDiasTranscurridos;
	}

	public static void calculaFecha(int cantDias, int anio, boolean esBisiesto) {
		// Modulo que muestra la fecha a partir de una cantidad ingresada de dias
		int dia = Fecha.getNumeroDia(), mes = Fecha.getNumeroMes();
		int diasRestantes;
		Fecha.setNumeroAnio(anio);

		// Caso para año bisiesto
		if (esBisiesto) {
			if (cantDias <= 31) {
				mes = 1;
				diasRestantes = 31 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 60) {
				mes = 2;
				diasRestantes = 60 - cantDias;
				dia = 29 - diasRestantes;
			} else if (cantDias <= 91) {
				mes = 3;
				diasRestantes = 91 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 121) {
				mes = 4;
				diasRestantes = 121 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 152) {
				mes = 5;
				diasRestantes = 152 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 182) {
				mes = 6;
				diasRestantes = 182 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 213) {
				mes = 7;
				diasRestantes = 213 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 244) {
				mes = 8;
				diasRestantes = 244 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 274) {
				mes = 9;
				diasRestantes = 274 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 305) {
				mes = 10;
				diasRestantes = 305 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 335) {
				mes = 11;
				diasRestantes = 335 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 366) {
				mes = 12;
				diasRestantes = 366 - cantDias;
				dia = 31 - diasRestantes;
			}
		}

		// Caso para año no bisiesto
		if (!esBisiesto) {
			if (cantDias <= 31) {
				mes = 1;
				diasRestantes = 31 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 59) {
				mes = 2;
				diasRestantes = 59 - cantDias;
				dia = 28 - diasRestantes;
			} else if (cantDias <= 90) {
				mes = 3;
				diasRestantes = 90 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 120) {
				mes = 4;
				diasRestantes = 120 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 151) {
				mes = 5;
				diasRestantes = 151 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 181) {
				mes = 6;
				diasRestantes = 181 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 212) {
				mes = 7;
				diasRestantes = 212 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 243) {
				mes = 8;
				diasRestantes = 243 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 273) {
				mes = 9;
				diasRestantes = 273 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 305) {
				mes = 10;
				diasRestantes = 304 - cantDias;
				dia = 31 - diasRestantes;
			} else if (cantDias <= 334) {
				mes = 11;
				diasRestantes = 334 - cantDias;
				dia = 30 - diasRestantes;
			} else if (cantDias <= 365) {
				mes = 12;
				diasRestantes = 365 - cantDias;
				dia = 31 - diasRestantes;
			}
		}

		System.out.print("La fecha es: " + dia + "/" + mes + "/" + anio);
		System.out.println("");
	}

}
