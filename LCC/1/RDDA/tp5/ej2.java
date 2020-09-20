package tp5;

public class ej2 {
	
	public static void cantidadCeros (int [][] arreglo) {
		// Modulo que muestra la cantidad de ceros por renglon del arreglo
		int cantidad = 0;
		int fila, col;
		
		for (fila = 0; fila < arreglo.length; fila++) {
			for (col = 0; col < arreglo[fila].length; col++) {
				if (arreglo[fila][col] == 0) {
					cantidad++;
					System.out.println("Cantidad de ceros en la fila " + fila + ": " + cantidad);
				}								
			}				
		}		
	}
	
	/*
	public static void sumaValores (int [][] arreglo) {
		// Modulo que calcula la suma de los valores de cada fila
		int fila, col;
		int longitud = arreglo.length;
		
		//for (fila = 0; fila < longitud)
		
	}
	*/
	
	
	
	
	public static void main(String[] args) {
		// Declaracion de variables
		int arregloNumeros [][] = {{0, 2, 5, 7, 6}, {0, 0, 0, 3, 8}, {2, 9, 6, 3, 4}, {1, 5, 6, 1, 4}, {0, 9, 2, 5, 0}};
		
		System.out.println("Cantidad de ceros por renglon");
		cantidadCeros(arregloNumeros);
		System.out.println(" ");
		System.out.println("Suma de valores de cada fila: ");
		System.out.println("Arreglo con el minimo valor de cada columna: ");
		System.out.println("Suma de valores de la diagonal: ");
	}

}
