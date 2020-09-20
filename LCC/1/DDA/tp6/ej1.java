package tp6;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej1 {
    

    
    
    
    
    public static void main (String [] args){
        // Declaracion y asignacion de variables
        int [] arreglo;
        int longitudArreglo, i;
        
        // Ingreso y lectura de datos
        System.out.println("Ingrese la longitud del arreglo: ");
        longitudArreglo = TecladoIn.readInt();
        arreglo = new int [longitudArreglo];
        
        // Armado del array
        for (i = 0; i < longitudArreglo; i++){
            System.out.println("Ingrese un numero: ");
            arreglo [i] = TecladoIn.readInt();
        }
        
        System.out.println(arreglo);
    }
    
}
