package tp6;
import tp6.PuntosPorCliente;
import utiles.TecladoIn;

public class TestPuntosCliente {
	
	public static PuntosPorCliente cargarPuntos (PuntosPorCliente [] clientes, int posicion) {
		// Modulo que carga lo datos requeridos de los arboles
		// Declaracion de variables
		int nroCliente, i, puntos;
		boolean existe = false;
		
		// Ingreso y lectura de datos
		System.out.println("Ingrese el numero de cliente: ");
		nroCliente = TecladoIn.readLineInt();
		System.out.println("Ingrese la cantidad de puntos del cliente: ");
		puntos = TecladoIn.readLineInt();
		
		// Creacion del objeto c1 (cliente1) para controlar si ya existe otro igual
		PuntosPorCliente c1 = new PuntosPorCliente(nroCliente);
		c1.setPuntos(puntos);
		
		// Verifico existencia de clientes en el arreglo
		if (posicion > 0) {
			i = 0;
			while (!existe && (i < posicion)) {
				existe = c1.equals(clientes[i]);
				i++;
			}
		}
		
		if (existe) {
			nroCliente = 0;
			puntos = 0;
		}
		
		// Creacion del objeto c (cliente)
		PuntosPorCliente c = new PuntosPorCliente(nroCliente);
		c.setPuntos(puntos);
		
		// Devolucion de datos
		return c;
	}
	
	
	public static void menu() {
		// Modulo que muestra el menu de opciones a realizar para el usuario
        System.out.println("________________________");
        System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
        System.out.println("");
        System.out.println("1: Carga de datos.");
        System.out.println("2. TBD");
        System.out.println("3. TBD");
        System.out.println("4. TBD");
        System.out.println("5. TBD");
        System.out.println("0. Terminar programa");
        System.out.println("________________________");
        System.out.println("");
        System.out.print("Ingrese una opcion a realizar: ");
	}
	
	
	public static void main (String [] args) {
		// Algoritmo ppal
		// Declaracion y asignacion de variables
		int opcion = -1;
		int longitudArreglo;
		int posicion = 0;
		int i;
		
		// Creacion del arreglo
		System.out.println("Cantidad de clientes a ingresar: ");
		longitudArreglo = TecladoIn.readInt();
		// Asignacion de longitud + creacion de objetos
		PuntosPorCliente arregloClientes [] = new PuntosPorCliente[longitudArreglo];
		
		// Recorro el arreglo para ver cuantos clientes hay
		for (i = 0; i < arregloClientes.length; i++) {
			if (arregloClientes[i] != null) {
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
					System.out.println("Cargar clientes.");
					String respuesta = "si", respuesta1;
					while (!respuesta.equalsIgnoreCase("no") && (posicion < arregloClientes.length)){
						// Invocacion del modulo para cargar datos
						arregloClientes[posicion] = cargarPuntos(arregloClientes, posicion);
						if (arregloClientes[posicion].getNroCliente() != 0) {
							posicion++;
						} else {
							System.out.println("Este cliente ya fue ingresado!");
						}
						
						System.out.println("Desea cargar otro cliente? Si|No: ");
						respuesta1 = TecladoIn.readLine();
						respuesta = respuesta1.toLowerCase();
					}
					
					if (posicion == arregloClientes.length) {
						System.out.println("ERROR! Ya se han llenados todos los lugares y no se admiten mas clientes.");
					}
					break;
				case 2:
					System.out.println("Usted eligio la opcion 2.");
					break;
				case 3:
					System.out.println("Usted eligio la opcion 3.");
					break;
				case 4:
					System.out.println("Usted eligio la opcion 4.");
					break;
				case 5:
					System.out.println("Usted eligio la opcion 5.");
					break;
				default:
					System.out.println("Opcion incorrecta. Verfique y reingrese.");
			}
		}while (opcion != 0);
		
		if (opcion == 0) {
			System.out.println("Programa finalizado.");
		}
		
		
	}
}
