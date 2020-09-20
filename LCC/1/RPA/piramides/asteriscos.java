package piramides;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class asteriscos {
    
    public static void main(String[] args) {
        // Este algoritmo imprime una piramide de asteriscos  al estilo: * ** *** ****
        // Declaracion de variables
        int matriz;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese el orden de la matriz: ");
        matriz = TecladoIn.readInt();
        
        // Armado de piramide
        for (int fila = 1; fila <= matriz; fila++){
            for (int columna = 1; columna <= fila; columna++){
                System.out.print("*");
            }
            System.out.println("");
        }
    } 
}
