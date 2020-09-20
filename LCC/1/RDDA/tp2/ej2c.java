package tp2;

public class ej2c {
	
	// Imprime la secuencia 2 4 6 8 10 12 solamente si se modifica la estructura de repetecion y se agrega el contador
	
	public static void main (String [] args) {
		// Declaracion de variables
		int c = 1;
		
		do {
			System.out.print((c * 2) + " ");
			c++;
		} while (c < 6);
	}

}
