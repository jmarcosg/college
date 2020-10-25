package practicaFinal;

import utiles.TecladoIn;

public class tpVero {
	
	// Menu de opciones
	public static void mostrarMenu() {
        System.out.println("____________________________________________________________");
        System.out.println("");
        System.out.println("Ingrese el numero correspondiente a la opcion que quiera");
        System.out.println("");
        System.out.println("(0) Salir");
        System.out.println("(1) Leer una cadena compuesta solo por letras y el espacio en blanco.");
        System.out.println("(2) ");
        System.out.println("(3) ");
        System.out.println("(4) ");
        System.out.println("");
        System.out.println("_____________________________________________________________");
    }
	
	public static int verificarPalabra (String pal) {
		int longitudPalabra = pal.length();
		return longitudPalabra;
	}

	public static void main(String[] args) {
		// Main code
		// Declaracion e inicializacion de variables
		String palabra = "";
		int opcion;
		
		do {
			mostrarMenu();
			opcion = TecladoIn.readInt();
			
			switch (opcion) {
				case 1:
					System.out.println("Ingrese una palabra: ");
					palabra = TecladoIn.readLine();
					verificarPalabra(palabra);
			}
		} while (opcion != 0);
	}
}
