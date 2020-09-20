package tp2;

public class ej2a {
	
	// Solamente imprime la secuencia 2 4 6 9 10 12 si se inicia a la variable c en 0
	
	public static void main (String [] args) {
		// Declaracion de variables
		int c = 0;
		
		while (c < 13) {
			System.out.print(c + " ");
			c = c + 2;
		}	
	}

}
