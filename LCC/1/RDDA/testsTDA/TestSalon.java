package testsTDA;

import utiles.TecladoIn;

public class TestSalon {
	
	public static void compararSalones (Salon [] salones) {
		// Modulo para ordenar salones
		String nombreSalon= "", salon1 = "", salon2 = "";
		int i, valor = 0;
		boolean ordenado = false;
		
		for (i = 1; i < salones.length; i++) {
			salon1 = salones[i -1];
			salon2 = salones [i];
			valor = salon1.compareToIgnoreCase(salon2);
			
			if (valor == -1) {
				ordenado = true;
			} else if (valor == 1) {
				ordenado = false;
			} else if (valor == 0) {
				System.out.println("Hay dos salones con el mismo nombre.");
			}
			
			if (ordenado == true) {
				System.out.println("Los salones estan ordenados alfabeticamente.");
			} else {
				System.out.println("Los salones no estan ordenados alfabeticamente.");
			}
		}		
	}
	
	public static void salonMasGrande (Salon [] salones) {
		int capacidad = 0, mayorCapacidad = 0;
		
		for (Salon s : salones) {
			 capacidad = s.getDisponibilidadSalon();
			 if (capacidad > capacidad) {
				 mayorCapacidad = capacidad;
			 }
		}
		System.out.println("El salon con mayor capacidad tiene: " + mayorCapacidad);
	}
	
	
	public static void menu() {
		// Modulo que muestra el menu de opciones a realizar para el usuario
		System.out.println("________________________");
		System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
		System.out.println("");
		System.out.println("0. Terminar programa");
		System.out.println("1. Mostrar el salon con mayor capacidad.");
		System.out.println("2. Verificar si los salones estan ordenados alfabeticamente.");
		System.out.println("");
		System.out.println("________________________");
		System.out.println("");
		System.out.print("Ingrese una opcion a realizar: ");
	}

	
	public static void main(String[] args) {
		// Algoritmo ppal
		// Declaracion e inicializacion de variables
		int opcion, posicion = 0, posicionSalon = 0;
		String salonBuscado = "";
		
		// Dejo al arreglo predefinido
		Salon[] salones = new Salon [5];
		salones [0] = {"Alkala", 75, true, "Calle Falsa 123", "489-8973"};
		salones [1] = {"Genovesa", 100, true, "Calle Inventada 231", "4569-7894"};
		salones [2] = {"Pegasus", 50, true, "Calle No Real 324", "458-1526"};
		salones [3] = {"Esmeralda", 200, true, "Calle Super Inventada 1234", "4111-1111"};
		salones [4] = {"Imperatriz", 30, false, "Por Alla Lejos 14788", "4789-9874"};
		
		// Menu de opciones
		do {
			menu();
			opcion = TecladoIn.readInt();
			switch (opcion) {
			case 1:
				salonMasGrande(salones);
				break;
			case 2:
				compararSalones(salones);
			}
		} while (opcion != 0);
		
		
	}
	
}
