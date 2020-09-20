package tp10;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej2 {
    
    public static void main (String [] args) {
        // Este algoritmo cuenta la cantidad de letras y numeros de una cadena de caracteres
        // Declaracion y asignacion de variables
        String palabra;
        int totalDigitos = 0, totalLetras = 0;
        
        // Ingreso y lectura de datos 
        System.out.print("Ingrese una palabra: ");
        palabra = TecladoIn.readLine();
        
        // Calculos
        for (int i = 0; i < palabra.length(); i++) {
            if (Character.isLetter(palabra.charAt(i))){
                totalLetras++;
            } else if (Character.isDigit(palabra.charAt(i))){
                totalDigitos++;
            }
        }
        
        // Devolucion de datos
        System.out.println("Total letras: " + totalLetras);
        System.out.println("Total digitos: " + totalDigitos);
    }
}
