package tp3;
import utiles.TecladoIn;

public class ej1{
	public static void posicionesPares(int[] arreglo, int longitud){
		// Modulo que muetra a los elementos en posiciones pares
		// Declaracion de variables
	    int i;

	    for (i = 0; i < arreglo.length; i = i + 2){
	        System.out.print(arreglo[i] + " ");
	    }
	}

	public static void dobleImpar(int[] arreglo, int longitud){
		// Modulo que duplica a los elementos impares
		// Declaracion de variables
	    int i;
	    
	    // Busco a los elementos impares y luego los duplico a si mismos
	    for (i = 0; i < arreglo.length; i++) {
	        if (arreglo[i] % 2 == 1) {
	            arreglo[i] = arreglo[i] * 2;
	        }
	    }
	    
	    // Devuelvo el arreglo
	    for (i = 0; i < arreglo.length; i++){
	        System.out.print(arreglo[i] + " ");
	    }
	    
	}

	public static int promedioArreglo(int[] arreglo, int longitud){
		// Modulo que calcula el promedio de todos los elementos ingresados
		// Declaracion de variables
	    int i, promedio = 0;
	    
	    // Calculos
	    for (i = 0; i < longitud; i++){
	        promedio = promedio + arreglo[i];
	    }
	    promedio = promedio / longitud;
	    
	    return promedio;
	}

	public static boolean ordenado(int[] arregloNumero, int longitud){
		// Modulo que verifica si los elementos del arreglo estan ordenados de forma creciente
	    int i = 0;
	    boolean estaOrdenado = true;

	    while (estaOrdenado && (i < longitud)){
	        if (arregloNumero[i] > arregloNumero[i + 1]){
	            estaOrdenado = false;
	        }
	        i++;
	    }
	    return estaOrdenado;
	}

	public static void main(String[] args){
	    // (a) Permita leer N números enteros, los almacene en un arreglo y retorne el arreglo.
	    //Declaracion de variables
	    int[] arregloNumero;   //Declaracion del arreglo de Numeros Enteros
	    int i, longitud;

	    System.out.print("Ingrese la longitud del arreglo: ");
	    longitud = TecladoIn.readLineInt();

	    arregloNumero = new int[longitud];  //Creacion de arreglo con la longitud que deseo

	    for (i = 0; i < longitud; i++) {
	        System.out.print("Ingrese un elemento para el arreglo en la posicion " + i + " : ");
	        arregloNumero[i] = TecladoIn.readLineInt();
	    }

	    //Muestro el arreglo original
	    for (i = 0; i < arregloNumero.length; i++){
	        System.out.print(arregloNumero[i] + " ");
	    }

	    System.out.println("Posiciones Pares: ");
	    posicionesPares(arregloNumero, longitud);

	    System.out.println("Dobles de Impares: ");
	    dobleImpar(arregloNumero, longitud);

	    System.out.println("Promedio del arreglo: "+promedioArreglo(arregloNumero, longitud));
	    
	    System.out.println("¿Esta ordenado? "+ordenado(arregloNumero, longitud));

	}
}
