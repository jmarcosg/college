package tpObligatorio;
import utiles.TecladoIn;
import tpObligatorio.Arbol;
        
/**
 *
 * @author Juan Marcos Gonzalez
 */
public class TestVivero {
    
   
    public static Arbol cargarArbol(Arbol [] vivero, int posicion){
        // Modulo que carga los datos requeridos de los arboles
        // Declaracion de variables
        String nombre;
        int i, altura, profRaices, tempMinima;
        boolean existe = false;
        boolean frutal;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese el tipo de arbol: ");
        String nombre1 = TecladoIn.readLine();
        nombre = nombre1.toLowerCase();
        System.out.print("Ingrese la altura del arbol: ");
        altura = TecladoIn.readInt();
        System.out.print("Ingrese la profundidad de las raices: ");
        profRaices = TecladoIn.readInt();
        System.out.print("Es un arbol frutal? Si|No: ");
        String esFrutal1 = TecladoIn.readLine();
        String esFrutal = esFrutal1.toLowerCase();        
        // Verifica si el arbol ya fue ingresado
        while (!(esFrutal.equalsIgnoreCase("si")) && !(esFrutal.equalsIgnoreCase("no"))){
            System.out.print("Opcion incorrecta. Es un arbol frutal? Si|No: ");
            esFrutal1 = TecladoIn.readLine();
            esFrutal = esFrutal1.toLowerCase();
        }
        System.out.print("Ingrese la temperatura minima que soporta: ");
        tempMinima = TecladoIn.readInt();
        
        // Creacion del objeto a1(arbol1) para controlar si ya existe otro igual
        Arbol a1 = new Arbol(nombre);
        a1.setAltura(altura);
        a1.setProfR(profRaices);
        a1.setFrutos(existe);
        a1.setTempMin(tempMinima);
        
        // Verifica existencia de arboles en el array
        if (posicion > 0){
            i = 0;
            while (!existe && (i < posicion)){
                existe = a1.equals(vivero[i]);
                i++;
            }
        }
        if(existe){
            nombre = null;
            altura = 0;
            profRaices = 0;
            frutal = false;
            tempMinima = 0; 
        }
        
        // Cracion del objeto a(arbol)
        Arbol a = new Arbol(nombre);
        a.setAltura(altura);
        a.setProfR(profRaices);
        a.setFrutos(frutal);
        a.setTempMin(tempMinima);
        
        // Devolucion de datos
        return a;        
    }
    
    
    private static String arbolMayorDiezMetros(Arbol [] vivero, int posicion){
        // Modulo que lista a los arboles mayores a 10 metros
        // Declaracion de variables
        String lista = "";
        int i;
        
        // Busqueda de arboles mayores a 10 metros de altura
        for (i = 0; i < posicion; i++){
            if (vivero[i].getAltura() > 10){
                lista += vivero[i].toString() + " ";
            }
        }
        if (lista.trim().isEmpty()){
            lista += "Su lista no posee arboles mayores a 10 metros";
        }
        return lista;
    }
    
    
    private static String arbolBajoCero(Arbol [] vivero, int posicion){
        // Modulo que muestra a los arboles que soportan temperaturas bajo cero
        // Declaracion de variables
        int contador = 0, i;
        String lista = "";
        
        // Busqueda y contador de arboles que soportan temperaturas bajo cero
        for (i = 0; i < posicion; i++){
            if (vivero[i].gettempMinima() < 0){
                lista += "Arbol: " + vivero[i].getNombre() + " ";
                contador++;
            }
        }
        if (contador != 0){
            lista +="El total de arboles que soportan temperaturas bajo cero son: " + contador;
        } else {
            lista += "Su lista no posee arboles que soporten temperaturas bajo cero";
        }
        return lista;
    }
    
    
    private static String esArbolFrutal(Arbol [] vivero, int posicion){
        // Modulo que lista los nombres de los arboles frutales
        // Declaracion de variables
        String lista = "";
        int i;
        
        // Busqueda de arboles frutales
        for (i = 0; i < posicion; i++){
            if (vivero[i].getFrutos()){
                lista += vivero[i].getNombre() + " ";
            }
        }
        if (lista.trim().isEmpty()){
            lista += "Su lista no posee arboles frutales.";
        }
        return lista;
    }
    
    
    public static void Menu(){
        // Modulo que muestra el menu de opciones a realizar para el usuario
        System.out.println("________________________");
        System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
        System.out.println("");
        System.out.println("1: Carga de datos.");
        System.out.println("2. Listar arboles. (Para arboles mayores a 10m de altura).");
        System.out.println("3. Contar arboles. (Para arboles que soporten temperaturas menores a los 0ºC).");
        System.out.println("4. Mostrar arboles frutales.");
        System.out.println("5. Mostrar todos los arboles.");
        System.out.println("0. Terminar el programa.");
        System.out.println("________________________");
        System.out.print("Ingrese una opcion a realizar: ");
    }
    
    
    public static void main(String []args){
        // Algoritmo principal
        // Declaracion y asignacion de variables
        int opcion = -1;
        int longitudArreglo;
        int posicion = 0;
        int i;
        
        // Creacion del array
        System.out.print("Cantidad de arboles a ingresar: ");
        longitudArreglo = TecladoIn.readInt();
        // Asignacion de longitud + creacion de objetos
        Arbol arregloVivero[] = new Arbol[longitudArreglo];
        
        // Recorrer el array para ver cuantos arboles hay
        for (i = 0; i < arregloVivero.length; i++){
            if (arregloVivero[i] != null){
                posicion++;
            }
        }

        // Menu de opciones
        do{
            Menu();
            opcion = TecladoIn.readInt();
            switch (opcion){
                case 1:
                    System.out.println("Usted eligio la opcion 1.");
                    System.out.println("Cargar arboles.");
                    String respuesta = "si", respuesta1;
                    while (!respuesta.equalsIgnoreCase("no") && (posicion < arregloVivero.length)){
                        // Llamado al modulo para cargar datos
                        arregloVivero[posicion] = cargarArbol(arregloVivero, posicion);
                        if (arregloVivero[posicion].getNombre() != null){
                            posicion++;
                        } else {
                            System.out.println("Este arbol ya fue ingresado!");
                        }
                        System.out.print("Desea cargar otro arbol? Si|No: ");
                        respuesta1 = TecladoIn.readLine();
                        respuesta = respuesta1.toLowerCase();                       
                    }
                    if (posicion == arregloVivero.length){
                        System.out.println("ERROR! Se han llenado todos los lugares y no se admiten mas arboles.");
                    }
                    break;
                case 2:
                    System.out.println("Usted eligio la opcion 2.");
                    String lista1 = arbolMayorDiezMetros(arregloVivero, posicion);
                    System.out.println("Lista de arboles mayores a 10m: ");
                    System.out.println(lista1);
                    break;
                case 3:
                    System.out.println("Usted eligio la opcion 3.");
                    String lista = arbolBajoCero(arregloVivero, posicion);
                    System.out.println("Cantidad de arboles que soportan temperaturas bajo cero: ");
                    System.out.println(lista);
                    break;
                case 4:
                    System.out.println("Usted elegio la opcion 4.");
                    String lista2 = esArbolFrutal(arregloVivero, posicion);
                    System.out.println("Nombres de arboles frutales: ");
                    System.out.println(lista2);
                    break;
                default:
                    System.out.println("Opcion incorrecta. Verifique y reingrese.");
                    break;
            }
        }while (opcion != 0);
        if (opcion == 0){
            System.out.println("Programa finalizado.");
        }
    }
    
}