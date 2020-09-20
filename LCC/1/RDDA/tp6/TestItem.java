package tp6;
import tp6.Item;
import utiles.TecladoIn;

public class TestItem {

	public static void menu() {
		// Modulo que muestra el menu de opciones a realizar para el usuario
		System.out.println("________________________");
		System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
		System.out.println("");
		System.out.println("1: Carga de datos.");
		System.out.println("2. Mostrar todos los items.");
		System.out.println("3. Contar la cantidad de items SIN stock.");
		System.out.println("4. Contar la cantidad de items con precio unitario menor a un valor dado.");
		System.out.println("5. Aumentar a todos los items un porcentaje dado al precion unitario");
		System.out.println("0. Terminar programa");
		System.out.println("________________________");
		System.out.println("");
		System.out.print("Ingrese una opcion a realizar: ");
	}

	public static void main(String[] args) {
		// Algoritmo ppal
		// Declaracion de variables
		int opcion = -1;
		int posicion = 0;
		int longitudArreglo, i;

		// Creacion del arreglo
		System.out.println("Cantidad de items a ingresar: ");
		longitudArreglo = TecladoIn.readInt();
		// Asignacion de longitud + creacion de objetos
		Item arregloItems [] = new Item[longitudArreglo];
		
		// Recorro el arreglo para ver cuantos items hay
		for (i = 0; i < arregloItems.length; i++) {
			if (arregloItems[i] != null) {
				posicion++;				
			}
		}
		
		// Menu de opciones
		do {
			menu();
			opcion = TecladoIn.readInt();
			switch (opcion) {
				case 1:
					System.out.println("Usted eligio la opcion 1.");
					System.out.println("Cargar items");
					String respuesta = "si", respuesta1;
					while (!respuesta.equalsIgnoreCase("no") && (posicion < arregloItems.length)){
						// Invocacion del modulo para cargar datos
						// arregloItems[posicion] = cargarPuntos(arregloItems, posicion);
						/*
						  if (arregloItems[posicion].getNroCliente() != 0) {
							posicion++;
						} else {
							System.out.println("Este items ya fue ingresado!");
						}
					    */
						System.out.println("Desea cargar otro item? Si|No: ");
						respuesta1 = TecladoIn.readLine();
						respuesta = respuesta1.toLowerCase();
					}
					
					if (posicion == arregloItems.length) {
						System.out.println("ERROR! Ya se han llenados todos los lugares y no se admiten mas items.");
					}
					break;
				default:
					System.out.println("Opcion incorrecta. Verfique y reingrese.");
			}
		}while (opcion != 0);
		
		
		
		
		
		
	}

}
