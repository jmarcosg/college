package tp1;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej2 {
    public static void main (String []args){
        // Algoritmo misterioso
        // Declaracion de variables
        int x,y,z,a,b,c;
        // Ingreso y lectura de datos
        System.out.println("Ingrese X: ");
        x = TecladoIn.readInt();
        System.out.println("Ingrese Y: ");
        y = TecladoIn.readInt();
        System.out.println("Ingrese A: ");
        a = TecladoIn.readInt();
        System.out.println("Ingrese B: ");
        b = TecladoIn.readInt();
        // Calculos
        z = ((x * x) + (y * y));
        c = ((a * a) + (b * b));
        // Devolucion de datos
        System.out.println("El valor de Z es: "+z);
        System.out.println("El valor de C es: "+c);
    }
    
}
