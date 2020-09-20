package testsTDA;

import utiles.TecladoIn;

/**
 *
 * @author Rocio Graff
 */
public class TestVivero {

    // Menu con opciones para carga y solicitud de datos.
    public static void mostrarMenu() {
        System.out.println("____________________________________________________________");
        System.out.println("");
        System.out.println("Ingrese el numero correspondiente a la opcion que quiera");
        System.out.println("");
        System.out.println("(0) Salir");
        System.out.println("(1) Ingresar los datos del arbol");
        System.out.println("(2) Listar arboles de mas de 10mtrs de altura");
        System.out.println("(3) Cantidad de arboles que soportan temp. bajo 0");
        System.out.println("(4) Listado de nombres de arboles frutales");
        System.out.println("(5) Listado completo de los arboles");      //Opcion a parte implementada 
        System.out.println("-------------- Utilizando Medodos de Ordenamiento --------------------");
        System.out.println("(6) Ordenamiento por nombre con Burbuja Mejorado");
        System.out.println("(7) Ordenamiento por nombre con Met.Seleccion");
        System.out.println("(8) Ordenamiento por nombre con Met.Insercion");
        System.out.println("(9) Busqueda Binaria verificando si existe el arbol solicitado");
        System.out.println("(10) Ordenamiento de arboles por altura con Quick Sort");
        System.out.println("-------------- Utilizando el Medodo Recursivo ------------------------");
        System.out.println("(11) Cantidad de árboles con raices superiores a -x- mtrs de profundidad ");
        System.out.println("");
        System.out.println("_____________________________________________________________");
    }

    /* Creo objeto vivero(array) de la clase Arbol,
     * Invoca funciones de acuerdo lo solicitado en el menu.
     */
    public static void main(String[] arg) {
        //Declaracion de variables
        int cantArboles, opcion, lugar = 0, i;
        boolean salir = false;

        //Inicializacion de variables
        cantArboles = 20;       //Espacio limitado para ingresar los datos

        Arbol vivero[] = new Arbol[cantArboles];   //Declaracion del arreglo vivero
        //Creacion de objetos arbol para el arreglo vivero
        vivero[0] = new Arbol("prunus cerasus", 3, 1, true, 0);      //Cereza
        vivero[1] = new Arbol("prunus domestica", 3, 1, true, -1);   //Ciruela
        vivero[2] = new Arbol("prunus nectarina", 4, 1, true, -1);   //Durazno
        vivero[3] = new Arbol("pyrus communis", 4, 1, true, -2);     //Pera
        vivero[4] = new Arbol("malus domestica", 3, 1, true, -2);    //Manzano
        vivero[5] = new Arbol("citrus reticulata", 3, 1, true, -1);  //Naranja
        vivero[6] = new Arbol("betula sp.", 20, 2, false, 1);        //Abeto
        vivero[7] = new Arbol("grevilea robusta", 35, 3, false, -5); //Roble
        vivero[8] = new Arbol("ulmus minor", 40, 3, false, 2);       //Olmo
        vivero[9] = new Arbol("acacia caven", 20, 2, false, 1);      //Aromo criollo

        //Averiguo cuantos arboles hay en el vivero
        for (i = 0; i < vivero.length; i++) {
            if (vivero[i] != null) { //Solo los que tienen informacion guardada
                lugar++;
            }
        }

        while (!salir) {
            //Mostrar las opciones del menu
            mostrarMenu();

            //Leer las opciones del menu
            opcion = TecladoIn.readLineInt();

            switch (opcion) {
                case 0:                       //(0) Salir del sistema
                    salir = true;
                    System.out.println("El sistema vivero esta cerrado");
                    break;
                case 1:                       // (1) Carga de Datos
                    String resp = "si",
                     resp1;
                    while (!resp.equalsIgnoreCase("no") && (lugar < vivero.length)) {
                        vivero[lugar] = cargarArboles(vivero, lugar);       //Invoco funcion cargar datos del arbol
                        if (vivero[lugar].getNombre() != null) {
                            lugar++;             //Incrementa en uno la posicion del arreglo vivero 
                        } else {
                            System.out.println("Esos datos ya fueron ingresados");
                        }
                        System.out.println("Desea cargar otro arbol <si,no>: ");
                        resp1 = TecladoIn.readLine();
                        resp = resp1.toLowerCase();
                    }
                    if (lugar == vivero.length) {
                        System.out.println("No hay mas espacio en la memoria. No se puede ingresar mas datos");
                    }
                    break;
                case 2:                     // (2) Listado de Arboles
                    String lista = mostrarListado(vivero, lugar);         //Invoco la funcion listar los arboles con mas de 10m de altura
                    System.out.println("Listado de arboles con mas de 10m de altura: ");
                    System.out.println(lista);
                    break;
                case 3:                     // (3) Contar Arboles
                    String lista1 = contarArboles(vivero, lugar);         //Invoco la funcion contar los arboles que soportan temperaturas bajas
                    System.out.println("Cantidad de arboles que soportan temperaturas por debajo de los 0°C");
                    System.out.println(lista1);
                    break;
                case 4:                     // (4) Nombrar Arboles Frutales
                    String lista2 = mostrarArbFrutal(vivero, lugar);      //Invoco la funcion mostrar los arboles frutales
                    System.out.println("Nombres de arboles frutales: ");
                    System.out.println(lista2);
                    break;
                case 5:                    // (5) Listado de todos los arboles
                    String lista3 = listadoCompletoArboles(vivero, lugar); //Invoco la funcion listar todos los arboles del vivero
                    System.out.println("Listado completo de los arboles del vivero: ");
                    System.out.println(lista3);
                    break;
                case 6:                    // (6) Ordenamiento por nombre con Burbuja Mejorado
                    metodoBurbujaMejorado(vivero, lugar);                 //Invoco la funcion ordenar arboles por nombre con Burbuja Mejorado
                    System.out.println("\nListado ordenado alfabeticamente (Burbuja)\n");
                    for (i = 0; i < lugar; i++) {
                        System.out.println(vivero[i].toString() + "\n");
                    }
                    break;
                case 7:                    // (7) Ordenamiento por nombre con Met.Selección 
                    metodoSeleccion(vivero, lugar);                       //Invoco la funcion ordenar arboles por nombre con Met.Seleccion
                    System.out.println("\nListado ordenado alfabeticamente (Seleccion)\n");
                    for (i = 0; i < lugar; i++) {
                        System.out.println(vivero[i].toString() + "\n");
                    }
                    break;
                case 8:                    // (8) Ordenamiento por nombre con Met.Inserción
                    metodoInsercion(vivero, lugar);                       //Invoco la funcion ordenar arboles por nombre con Met.Insercion
                    System.out.println("\nListado ordenado alfabeticamente (Insercion)\n");
                    for (i = 0; i < lugar; i++) {
                        System.out.println(vivero[i].toString() + "\n");
                    }
                    break;
                case 9:                    // (9) Busqueda Binaria verificando si existe un árbol solicitado
                    String lista4 = busquedaBinaria(vivero, lugar);       //Invoco la funcion de busqueda de un arbol existente con Busqueda Binaria
                    System.out.println(lista4);
                    break;
                case 10:                   // (10) Ordenamiento de árboles por altura con Quick Sort
                    metodoQuicksort(vivero, 0, lugar - 1);                //Invoco la funcion ordenar arboles por altura con Quick Sort
                    System.out.println("\nListado ordenado por altura (Quick Sort)\n");
                    for (i = 0; i < lugar; i++) {
                        System.out.println(vivero[i].toString() + "\n");
                    }
                    break;
                case 11:                   //(11) Cantidad de árboles con raices superiores a -x- mtrs de profundidad
                    System.out.println("\nIngrese en metros profundidad de las raices: \n");
                    int raiz = TecladoIn.readLineInt();
                    int cantidad = metodoRecursivo(vivero, 0, lugar, raiz);//Invoco la funcion contar arboles con raices profundas con Metodo Recursivo
                    if (cantidad > 0) {
                        System.out.println("\nCantidad de arboles con raices mayores a " + raiz + " mtrs. es: " + cantidad + "\n");
                    } else {
                        System.out.println("\nNo hay arboles con raices mayores a " + raiz + " mtrs de profundidad\n");
                    }
                    break;
                default:
                    System.out.println("Su opcion no es valida");
                    break;
            }
        }
    }

    /*(1) Cargar los datos de los arboles
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return un objeto Arbol
     */
    public static Arbol cargarArboles(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        String nombre;
        int i, altura, profRaices, tempMinima;
        boolean existe = false, frutos;

        //Solicita datos del arbol
        System.out.println("Ingrese el nombre del árbol: ");
        nombre = TecladoIn.readLine();
        System.out.println("Ingrese la altura del árbol expresada en mtrs: ");
        altura = TecladoIn.readLineInt();
        System.out.println("Ingrese la profundidad de las raíces expresada en mtrs: ");
        profRaices = TecladoIn.readLineInt();
        System.out.println("Ingrese la temperatura mínima que soporta el árbol: ");
        tempMinima = TecladoIn.readLineInt();
        System.out.println("Ingrese si tiene frutos <si/no>: ");
        String esFrutal1 = TecladoIn.readLine();
        String esFrutal = esFrutal1.toLowerCase();

        //Controla ingreso de datos <si/no> 
        while (!(esFrutal.equalsIgnoreCase("si")) && !(esFrutal.equalsIgnoreCase("no"))) {
            System.out.println("Ingrese nuevamente es un árbol frutal <si/no>: ");
            esFrutal1 = TecladoIn.readLine();
            esFrutal = esFrutal1.toLowerCase();
        }
        frutos = (esFrutal.equalsIgnoreCase("si"));

        //Creo un objeto arbol1 auxiliar para controlar si existen los datos
        Arbol arbol1 = new Arbol(nombre);
        arbol1.setAltura(altura);
        arbol1.setProfR(profRaices);
        arbol1.setFrutos(frutos);
        arbol1.setTempMin(tempMinima);

        //Verifica si existen arboles en el arreglo
        if (lugar > 0) {
            i = 0;
            while (!existe && (i < lugar)) {     //Busqueda de datos repetidos
                existe = arbol1.equals(vivero[i]);
                i++;
            }
        }
        if (existe) {
            nombre = null;
            altura = 0;
            profRaices = 0;
            frutos = false;
            tempMinima = 0;
        }
        //Creo un objeto arbol
        Arbol arbol = new Arbol(nombre);
        arbol.setAltura(altura);
        arbol.setProfR(profRaices);
        arbol.setFrutos(frutos);
        arbol.setTempMin(tempMinima);

        return arbol;
    }

    /*(2) Listar arboles de mas de 10m de altura,
     * @param int lugar indice del arreglo vivero
     * @param objeto arbol vivero
     * @return una lista con  la informacion solicitada
     */
    private static String mostrarListado(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        String lista = "";
        int i;

        //Busca arboles que superen los 10 metros de altura
        for (i = 0; i < lugar; i++) {
            if (vivero[i].getAltura() > 10) {
                lista += vivero[i].toString()
                        + //Muestro todos los atributos que tiene el arbol
                        "\n*********************************************************************************\n";
            }
        }
        if (lista.trim().isEmpty()) {           //Devuelve true en caso de que el tamaño de la cadena "lista" sea nula
            lista += "No hay arboles que superen los 10m de altura";
        }
        return lista;
    }

    /*(3) Cantidad de arboles que soportan temperaturas bajo 0°C,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return una lista con la informacion solicitada
     */
    private static String contarArboles(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        int contador = 0, i;
        String lista = "";

        //Encuentra cantidad de arboles que soportan temp. bajo cero
        for (i = 0; i < lugar; i++) {
            if (vivero[i].getTempMinima() < 0) {
                lista += "Nombre: " + vivero[i].getNombre()
                        + "\n--------------------------------------------------\n";
                contador++;
            }
        }
        if (contador != 0) {
            lista += "El total de arboles que soportan temperaturas bajo cero son " + contador + "";
        } else {
            lista += "No se encontron los datos solicitados";
        }
        return lista;
    }

    /*(4) Listado de nombres de arboles frutales,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return una lista con la informacion solicitada
     */
    private static String mostrarArbFrutal(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        String lista = "";
        int i;

        //Busqueda de arboles frutales
        for (i = 0; i < lugar; i++) {
            if (vivero[i].getFrutos()) {
                lista += vivero[i].getNombre()
                        + "\n--------------------------------------------------------------\n";
            }
        }
        if (lista.trim().isEmpty()) {            //Devuelve true en caso de que el tamaño de la cadena "lista" sea nula
            lista += "No se encontron los datos solicitados";
        }
        return lista;
    }

    /*(5) Listado completo de los arboles,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return una lista con la informacion de todos los arboles
     */
    private static String listadoCompletoArboles(Arbol[] vivero, int lugar) {
        //Modulo que devuelve un listado completo de los arboles 

        //Declaracion de variables
        String lista = "";
        int i;

        //Busqueda de arboles en el vivero
        for (i = 0; i < lugar; i++) {
            lista += "Nro de Arbol " + i
                    + "\n" + vivero[i].toString()
                    + //Muestro todos los atributos que tienen los arboles
                    "\n--------------------------------------------------------------\n";
        }
        if (lista.trim().isEmpty()) {            //Devuelve true en caso de que el tamaño de la cadena "lista" sea nula
            lista += "No se encontron los datos solicitados";
        }
        return lista;
    }

    /*(6) Ordenamiento por nombre con Burbuja Mejorado
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return vacio
     */
    private static void metodoBurbujaMejorado(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        int i, j;
        boolean sinCambio = false;
        i = 0;
        //Realiza el ordenamiento del arreglo
        while (i < lugar && !sinCambio) {
            sinCambio = true;
            for (j = 0; j < lugar - i - 1; j++) {
                if (vivero[j].getNombre().toLowerCase().compareTo(vivero[j + 1].getNombre().toLowerCase()) > 0) {
                    Arbol aux = vivero[j];
                    vivero[j] = vivero[j + 1];
                    vivero[j + 1] = aux;
                    sinCambio = false;
                }
            }
            i++;
        }
    }

    /*(7) Ordenamiento por nombre con Met.Selección,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return vacio
     */
    private static void metodoSeleccion(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        int i, j, min;
        //Realiza el ordenamiento del arreglo
        for (i = 0; i < lugar - 1; i++) {
            min = i;
            for (j = i + 1; j < lugar; j++) {
                if (vivero[min].getNombre().toLowerCase().compareTo(vivero[j].getNombre().toLowerCase()) > 0) {
                    min = j;
                }
            }
            Arbol aux = vivero[i];
            vivero[i] = vivero[min];
            vivero[min] = aux;
        }
    }

    /*(8) Ordenamiento por nombre con Met.Inserción,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return vacio
     */
    private static void metodoInsercion(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        int i, j;
        //Realiza el ordenamiento del arreglo
        for (i = 1; i < lugar; i++) {
            Arbol aux = vivero[i];
            j = i;
            while (j > 0 && vivero[j - 1].getNombre().toLowerCase().compareTo(aux.getNombre().toLowerCase()) > 0) {
                vivero[j] = vivero[j - 1];
                --j;
            }
            vivero[j] = aux;
        }
    }

    /*(9) Busqueda Binaria verifica si existe un árbol dado,
     * @param int lugar indice del arreglo vivero
     * @param objeto Arbol vivero
     * @return string lista con el dato solicitado o mensaje de error
     */
    private static String busquedaBinaria(Arbol[] vivero, int lugar) {
        //Declaracion de variables
        int j, inicio, fin, medio, encontrado = 0;
        boolean ordenado = true;
        String lista = "\n>>>>>>>>>>>  EL ARREGLO NO ESTA ORDENADO  <<<<<<<<<<<\n";
        inicio = 0;
        fin = lugar - 1;
        //Veriica que el arreglo este ordenado por algun metodo de ordenamiento
        j = 0;
        while (j < lugar - 1 && ordenado) {
            if (vivero[j].getNombre().toLowerCase().compareTo(vivero[j + 1].getNombre().toLowerCase()) > 0) {
                ordenado = false;
            }
            j++;
        }

        //Si el arreglo esta ordenado solicita el nombre del arbol a buscar
        if (ordenado) {
            System.out.println("\nIngrese el nombre del árbol a buscar: \n");
            String nom = TecladoIn.readLine();
            //Con el nombre el metodo lo busca dentro del arreglo
            while (inicio <= fin) {
                medio = (inicio + fin) / 2;
                if (nom.toLowerCase().compareTo(vivero[medio].getNombre().toLowerCase()) == 0) {
                    encontrado = medio;
                    inicio = fin + 1;
                } else {
                    if (nom.toLowerCase().compareTo(vivero[medio].getNombre().toLowerCase()) < 0) {
                        fin = medio - 1;
                    } else {
                        inicio = medio + 1;
                    }

                }
            }
            if (encontrado != 0) {
                lista = "El Arbol encontrado es: " + vivero[encontrado].toString() + "";
            } else {
                lista = "No se encontro el Arbol con el nombre " + nom + "";
            }
        }
        return lista;
    }

    /*(10) Ordenamiento de árboles por altura con Quick Sort,
     * @param int der indice del arreglo vivero
     * @param int izq indice del inicio del arreglo
     * @param objeto Arbol vivero
     * @return vacio
     */
    private static void metodoQuicksort(Arbol[] vivero, int izq, int der) {
        //Declaracion de variables
        Arbol pivote = vivero[izq]; //Tomamos el primer elemento como pivote
        int i = izq;    //i realiza la búsqueda de izquierda a derecha
        int j = der;    //j realiza la búsqueda de derecha a izquierda
        Arbol aux;

        while (i < j) {            //Mientras no se crucen las búsquedas
            while (vivero[i].getAltura() <= pivote.getAltura() && i < j) {
                i++;    //Busca un elemento mayor que pivote
            }
            while (vivero[j].getAltura() > pivote.getAltura()) {
                j--;    //Busca elemento menor que pivote
            }
            if (i < j) {                 //Si no se han cruzado                      
                aux = vivero[i];         //Los intercambia
                vivero[i] = vivero[j];
                vivero[j] = aux;
            }
        }
        vivero[izq] = vivero[j]; // se coloca el pivote en su lugar de forma que tendremos
        vivero[j] = pivote; // los menores a su izquierda y los mayores a su derecha
        if (izq < j - 1) {
            metodoQuicksort(vivero, izq, j - 1); // ordenamos subarray izquierdo
        }
        if (j + 1 < der) {
            metodoQuicksort(vivero, j + 1, der); // ordenamos subarray derecho
        }
    }

    /*(11) Cantidad de árboles con raices superiores a -x- mtrs de profundidad,
     * @param vivero[] arreglo de objetos de arboles
     * @param int inicio del arreglo
     * @param int lugar final del arreglo
     * @param int raiz dato a comparar
     * @return cantidad de arboles que cumplen lo solicitado
     */
    private static int metodoRecursivo(Arbol[] vivero, int inicio, int lugar, int raiz) {
        //Declaracion de variables
        int contador = 0;     //Caso Base
        //Metodo recursivo para contar arboles con raices mayores a raiz
        if (inicio < lugar) {
            if (vivero[inicio].getProfRaices() > raiz) {
                contador = 1 + metodoRecursivo(vivero, inicio + 1, lugar, raiz);
            } else {
                contador = metodoRecursivo(vivero, inicio + 1, lugar, raiz);
            }

        }
        return contador;
    }
}
