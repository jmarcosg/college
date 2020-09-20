package tp1;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej1 {
    public static void main (String []args){
        // Algoritmo que intercambia los valores de variables una con otra
        // Declaracion de variables
        int x,y;
        // Ingreso y lectura de datos
        System.out.print("Ingrese X: ");
        x = TecladoIn.readInt();
        System.out.print("Ingrese Y: ");
        y = TecladoIn.readInt();
        // Calculos
        x = x - y;
        y = x + y;
        x = y - x;
        // Devolucion de datos
        System.out.println("Intercambiando valores...");
        System.out.println("Los valores de X e Y ahora son");
        System.out.println("X: "+x);
        System.out.println("Y: "+y);
    }    
}
