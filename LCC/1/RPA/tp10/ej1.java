package tp10;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej1 {
    
    public static void main(String [] args) {
        // Este algoritmo el ultimo caracter de un String.
        // Declaracion de variables
        String palabra;
        // Ingreso y lectura de datos
        System.out.print("Ingrese una palabra: ");
        palabra = TecladoIn.readLine();
        // Devolucion de datos
        System.out.println("El ultimo caracter de la palabra " + palabra + " es: " + palabra.substring(palabra.length() - 1));
    }
    
}
