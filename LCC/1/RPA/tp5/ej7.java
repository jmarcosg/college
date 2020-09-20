package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej7 {

    public static void main(String[] args) {
        /*
         * Algoritmo que determina a partir de los datos ingresados si es un 
         * triangulo rectangulo.
         */
        // Declaracion y asignacion de variables
        int angulo1, angulo2, angulo3;
        boolean trianguloRectangulo;
        // Ingreso y lectura de datos
        System.out.print("Ingrese el angulo 1: ");
        angulo1 = TecladoIn.readInt();
        System.out.print("Ingrese el angulo 2: ");
        angulo2 = TecladoIn.readInt();
        System.out.print("Ingrese el angulo 3: ");
        angulo3 = TecladoIn.readInt();
        // Calculos
        trianguloRectangulo = (angulo1==90) || (angulo2==90) || (angulo3==90);
        // Devolucion de datos
        System.out.println("Es triangulo rectangulo? "+trianguloRectangulo);
    }
    
}
