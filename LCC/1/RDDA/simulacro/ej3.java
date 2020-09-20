package simulacro;

public class ej3 {
	
	public static String cortarPalabra (String palab) {
		// Modulo que devuelve un subtring de 5 caracteres
		String palabra = palab;
		
		palabra = palabra.substring(0, 4);
		
		return palabra;
	}
	
	public static void main(String[] args) {
		// Algoritmo ppal
		// Declaracion e inicializacion de variables
		String [] arregloPalabras = {"Acuerdo", "con", "todos", "totalmente"};
		String palabra;
		int i;
		
		// Recorro el arreglo buscando las palabras mayores a 5 caracteres para luego recortarlas
		for (i = 0; i < arregloPalabras.length; i++) {
			palabra = arregloPalabras[i];
			
			if (arregloPalabras[i].length() > 5) {
				palabra = cortarPalabra(palabra);
				System.out.print(palabra + ". ");
			} else {
				System.out.print(arregloPalabras[i] + " ");
			}
		}
	}
	
}
