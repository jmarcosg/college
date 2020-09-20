package piramides;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class clasica {
    public static void main (String [] args){
        // Piramide clasica 1 12 123 1234
        // Declaracion de variables
        int numero;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese el orden de la matriz: ");
        numero = TecladoIn.readInt();
        
        // Armado de piramide
        for (int fila = 1; fila <= numero; fila++){
            for (int columna = 1; columna <= fila; columna++){
                System.out.print(columna + " "); 
            }
            System.out.println(" ");
        }
    }
}
