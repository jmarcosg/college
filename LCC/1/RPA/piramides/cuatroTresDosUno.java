package piramides;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class cuatroTresDosUno {
    
        public static void main(String[] args) {
        // Este algoritmo imprime una matriz al estilo: 4444 333 22 11
        // Declaracion de variables
        int matriz;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese el orden de la matriz: ");
        matriz = TecladoIn.readInt();
        
        // Armado de piramide
        for (int fila = matriz; fila >= 1; fila--){
            for (int columna = 1; columna <= fila; columna++){
                System.out.print(fila);
            }
            System.out.println("");
        }
    } 
    
}
