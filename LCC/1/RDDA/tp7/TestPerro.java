package tp7;

import utiles.TecladoIn;

public class TestPerro {

	public static void main(String[] args) {
		// Algoritmo ppal
		// Declaracion y asignacion de variables
		int opcion, posicion = 0, posicionPerro = 0;
		String perroBuscado = "", apellidoBuscado = "", razaBuscada = "";

		// Dejo el arreglo predefinido
		Perro[] guarderia = new Perro[10];
		guarderia[0] = new Perro("Max", "Gonzalez", 2010, 9, 150, "si", "grande", "Golden Retriever");
		guarderia[1] = new Perro("Odin", "Rodriguez", 2015, 4, 100, "si", "mediano", "Husky Siberiano");
		guarderia[2] = new Perro("Thor", "Gomez", 2011, 8, 100, "no", "chico", "Caniche");
		guarderia[3] = new Perro("Toby", "Fernandez", 2016, 3, 200, "no", "mediano", "Pastor Aleman");
		guarderia[4] = new Perro("Tayson", "Lopez", 2015, 4, 200, "si", "chico", "Yorkshier Terrier");
		guarderia[5] = new Perro("Simba", "Diaz", 2011, 8, 300, "no", "grande", "Dalmata");
		guarderia[6] = new Perro("Loki", "Martinez", 2014, 5, 100, "no", "grande", "Boxer");
		guarderia[7] = new Perro("Timon", "Perez", 2016, 3, 300, "si", "chico", "Chihuahua");
		guarderia[8] = new Perro("Pumba", "Garcia", 2012, 7, 300, "si", "grande", "Bulldog Ingles");
		guarderia[9] = new Perro("Pafuera", "Sanchez", 2014, 5, 350, "si", "mediano", "Beagle");

		// Menu de opciones
		do {
			menu();
			opcion = TecladoIn.readInt();
			switch (opcion) {
			case 0:
				System.out.println("Se ha cerrado la guarderia.");
				break;
			case 1:
				String resp = "si", resp1;

				while (!(resp.equalsIgnoreCase("no")) && (posicion < guarderia.length)) {
					guarderia[posicion] = cargarPerros(guarderia, posicion); // Invocacion al modulo para cargar los
					// datos de los perros
					if (guarderia[posicion].getNombrePerro() != null) {
						posicion++; // Incrementa en uno la posicion del arreglo guarderia
					} else {
						System.out.println("Estos datos ya fueron ingresados.");
					}
					System.out.println("Desea cargar otro perro? Si|No: ");
					resp1 = TecladoIn.readLine();
					resp = resp1.toLowerCase();
				}
				if (posicion == guarderia.length) {
					System.out.println("No hay espacio para mas perros. No se puede ingresar mas datos.");
				}
				break;
			case 2:
				System.out.println("Usted ingreso la opcion 2.");
				System.out.println("Cuanto cobrar.");
				System.out.println("Ingrese el nombre del perro a cobrar: ");
				perroBuscado = TecladoIn.readLine();
				System.out.println("Ingrese el apellido del dueño: ");
				apellidoBuscado = TecladoIn.readLine();
				System.out.println("Ingrese la raza del perro: ");
				razaBuscada = TecladoIn.readLine();
				cobrarCliente(guarderia, perroBuscado, apellidoBuscado, razaBuscada);
				break;
			case 3:
				System.out.println("Usted Ingreso la opcion 3.");
				System.out.println("Mostrar a todos los perros.");
				mostrarPerros(guarderia);
				break;
			case 4:
				System.out.println("Usted ingreso la opcion 4.");
				System.out.println("Mostrar informacion de un perro.");
				System.out.println("Ingrese el nombre del perro: ");
				perroBuscado = TecladoIn.readLine();
				System.out.println("Ingrese el apellido del dueño: ");
				apellidoBuscado = TecladoIn.readLine();
				System.out.println("Ingrese la raza del perro: ");
				razaBuscada = TecladoIn.readLine();
				posicionPerro = informacionPerro(guarderia, perroBuscado, apellidoBuscado, razaBuscada);
				System.out.println(guarderia[posicionPerro]);
				break;
			case 5:
				System.out.println("Usted ingreso la opicon 5.");
				System.out.println("Modificar datos de un perro.");
				System.out.println("Ingrese el nombre del perro a modificar: ");
				perroBuscado = TecladoIn.readLine();
				System.out.println("Ingrese el apellido del dueño: ");
				apellidoBuscado = TecladoIn.readLine();
				System.out.println("Ingrese la raza del perro: ");
				razaBuscada = TecladoIn.readLine();
				modificarInformacion(guarderia, perroBuscado, apellidoBuscado, razaBuscada);
				break;
			}
		} while (opcion != 0);

		if (opcion == 0) {
			System.out.println("Programa finalizado.");
		}
	}
		
	public static void menu() {
		// Modulo que muestra el menu de opciones a realizar para el usuario
		System.out.println("________________________");
		System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
		System.out.println("");
		System.out.println("1: Carga de datos.");
		System.out.println("2. Cobrar al cliente.");
		System.out.println("3. Mostrar a todos los perros.");
		System.out.println("4. Ver informacion de un perro.");
		System.out.println("5. Modificar datos de un perro.");
		System.out.println("0. Terminar programa");
		System.out.println("");
		System.out.println("________________________");
		System.out.println("");
		System.out.print("Ingrese una opcion a realizar: ");
	}

	public static Perro cargarPerros(Perro[] guarderia, int posicion) {
		// Modulo que crea los objetos para el arreglo de perros
		String nom, ape, cuidados, tam, raza;
		int an, edad, i;
		double costo;
		boolean existe = false;

		// Solicita datos de los perros
		System.out.println("Ingrese el nombre del perro: ");
		nom = TecladoIn.readLine();
		System.out.println("Ingrese el apellido del dueño: ");
		ape = TecladoIn.readLine();
		System.out.println("Ingrese el año de nacimiento del perro: ");
		an = TecladoIn.readLineInt();
		System.out.println("Ingrese la edad del perro: ");
		edad = TecladoIn.readLineInt();
		System.out.println("Ingrese el costo diario del perro: ");
		costo = TecladoIn.readLineDouble();
		System.out.println("El perro tiene cuidados especiales? Si|No: ");
		cuidados = TecladoIn.readLine();
		cuidados = cuidados.toLowerCase();
		System.out.println("Ingrese el tamaño del perro: ");
		tam = TecladoIn.readLine();
		System.out.println("Ingrese la raza del perro: ");
		raza = TecladoIn.readLine();

		// Controla ingreso de datos <si/no>
		while (!(cuidados.equalsIgnoreCase("si")) && !(cuidados.equalsIgnoreCase("no"))) {
			System.out.println("Ingrese nuevamente, el perro tiene cuidados especiales? Si|No: ");
			cuidados = TecladoIn.readLine();
			cuidados = cuidados.toLowerCase();
		}

		// Creo un objeto perro1 auxiliar para controlar si existen los datos
		Perro perro1 = new Perro(nom, raza, an, edad, costo, cuidados, tam, raza);
		perro1.setApellidoDuenio(ape);
		perro1.setAnioNacimiento(an);
		perro1.setEdadPerro(edad);
		perro1.setCostoDiario(costo);
		perro1.setCuidadoEspecial(cuidados);
		perro1.setTamanioPerro(tam);
		perro1.setRazaPerro(raza);

		// Verifica si existe perros en el arreglo
		if (posicion > 0) {
			i = 0;
			while (!existe && (i < posicion)) { // Busco datos repetidos
				existe = perro1.equals(guarderia[i]);
				i++;
			}
		}

		if (existe) {
			nom = null;
			ape = null;
			an = 0;
			edad = 0;
			costo = 0.0;
			cuidados = null;
			tam = null;
			raza = null;
		}

		// Creo un objeto arbol
		Perro perro = new Perro(nom, raza, an, edad, costo, cuidados, tam, raza);
		perro.setApellidoDuenio(ape);
		perro.setAnioNacimiento(an);
		perro.setEdadPerro(edad);
		perro.setCostoDiario(costo);
		perro.setCuidadoEspecial(cuidados);
		perro.setTamanioPerro(tam);
		perro.setRazaPerro(raza);

		return perro;
	}

	public static boolean existePerro(Perro[] guarderia, String perro, String apellido, String raza) {
		// Modulo que verifica la existencia de un perro en el arreglo
		boolean existe = false;
		int i;

		for (i = 0; i < guarderia.length; i++) {
			if (guarderia[i].getNombrePerro().equalsIgnoreCase(perro)
					&& guarderia[i].getApellidoDuenio().equalsIgnoreCase(apellido)
					&& guarderia[i].getRazaPerro().equalsIgnoreCase(raza)) {
				existe = true;
			}
		}
		return existe;
	}

	public static void cobrarCliente(Perro[] guarderia, String nombrePerro, String apellido, String raza) {
		// Declaracion y asignacion de variables
		double precioPorDia = 0.0;
		double aumento = 0.0;
		double costoTotal;
		int cantDias;
		int posPerro;
		String tuvoCE = "";
		boolean existe;

		// Busco si el perro existe y la posicion en que se encuentra en el arreglo
		existe = existePerro(guarderia, nombrePerro, apellido, raza);
		posPerro = informacionPerro(guarderia, nombrePerro, apellido, raza);

		// Asigno el valor del porcentaje de incremento, no de la manera debida
		for (Perro p : guarderia) {
			aumento = p.getPorcIncremento();
		}

		if (existe) {
			// Ingreso y lectura de datos
			System.out.println("Cuantos dias estuvo el perro en la guarderia? ");
			cantDias = TecladoIn.readInt();

			// Utilizo el get en ambos casos para obtener los valores que corresponden al perro
			for (int i = posPerro; i < guarderia.length; i++) {
				tuvoCE = guarderia[posPerro].getCuidadoEspecial();
				precioPorDia = guarderia[posPerro].getCostoDiario();
			}

			// Calculos
			if ("si".equalsIgnoreCase(tuvoCE)) {
				costoTotal = (cantDias * precioPorDia) * aumento;
				System.out.println("TOTAL (con cuidados especiales): " + costoTotal);
			} else {
				costoTotal = (cantDias * precioPorDia);
				System.out.println("TOTAL (sin cuidados especiales): " + costoTotal);
			}

		} else {
			System.out.println("No se encuentra ninguno de los datos ingresados, revise por favor.");
		}
	}

	public static void mostrarPerros(Perro[] guarderia) {
		// Modulo para mostrar a todos los perros
		int i;
		for (i = 0; i < guarderia.length; i++) {
			System.out.println(guarderia[i].toString());
		}
	}

	public static int informacionPerro(Perro[] guarderia, String perro, String apellido, String raza) {
		// Modulo que muestra la informacion de un perro
		// Declaracion y asignacion de variables
		int i, posPerro = 0;

		// Recorro el arreglo buscando la informacion que me interesa para luego imprimir la informacion correspondiente al perro
		for (i = 0; i < guarderia.length; i++) {
			if (guarderia[i].getNombrePerro().equalsIgnoreCase(perro)
					&& guarderia[i].getApellidoDuenio().equalsIgnoreCase(apellido)
					&& guarderia[i].getRazaPerro().equalsIgnoreCase(raza)) {
				posPerro = i;
			}
		}
		return posPerro;
	}

	public static void modificarInformacion(Perro[] guarderia, String perroBuscado, String apellidoBuscado,
			String razaBuscada) {
		// Modulo que modifica la informacion de cierto perro
		// Declaracion y asignacion de variables
		String nom, ape, cuidados, tam, raza;
		int an, edad, posPerro;
		double costo;
		boolean existe;

		// Verifico la existencia del perro en la guarderia y la posicion donde se encuentra
		existe = existePerro(guarderia, perroBuscado, apellidoBuscado, razaBuscada);
		posPerro = informacionPerro(guarderia, perroBuscado, apellidoBuscado, razaBuscada);

		// Recorro el arreglo buscando al perro que me interesa modificar
		if (existe) {
			for (int i = posPerro; i < guarderia.length; i++) {
				System.out.println("Ingrese el nombre del perro: ");
				nom = TecladoIn.readLine();
				guarderia[posPerro].setNombrePerro(nom);
				System.out.println("Ingrese el apellido del dueño: ");
				ape = TecladoIn.readLine();
				guarderia[posPerro].setApellidoDuenio(ape);
				System.out.println("Ingrese el año de nacimiento del perro: ");
				an = TecladoIn.readInt();
				guarderia[posPerro].setAnioNacimiento(an);
				System.out.println("Ingrese la edad del perro: ");
				edad = TecladoIn.readInt();
				guarderia[posPerro].setEdadPerro(edad);
				System.out.println("Ingrese el costo diario del perro: ");
				costo = TecladoIn.readDouble();
				guarderia[posPerro].setCostoDiario(costo);
				System.out.println("El perro tiene cuidados especiales? Si|No: ");
				cuidados = TecladoIn.readLine();
				cuidados = cuidados.toLowerCase();
				guarderia[posPerro].setCuidadoEspecial(cuidados);
				System.out.println("Ingrese el tamaño del perro: ");
				tam = TecladoIn.readLine();
				guarderia[posPerro].setTamanioPerro(tam);
				System.out.println("Ingrese la raza del perro: ");
				raza = TecladoIn.readLine();
				guarderia[posPerro].setRazaPerro(raza);
			}
		}
	}

}
