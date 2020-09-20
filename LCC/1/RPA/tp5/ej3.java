package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej3 {

    public static void main(String[] args) {
        /* 
        * Algoritomo que calcula la cantidad de pintura en base a la
        * superficie, rendimiento de la pintura y cantidad de manos.
        */
        // Declaracion y asignacion de variables
        double altoPared, largoPared, superficiePared, rendimPintura, cantManos, cantPintura;
        // Ingreso y lectura de datos
        System.out.print("Ingrese el alto de la pared: ");
        altoPared = TecladoIn.readDouble();
        System.out.print("Ingrese el largo de la pared: ");
        largoPared = TecladoIn.readDouble();
        System.out.print("Ingrese el rendimiento de la pintura: ");
        rendimPintura = TecladoIn.readDouble();
        System.out.print("Ingrese la cantidad de manos: ");
        cantManos = TecladoIn.readDouble();
        // Calculos
        superficiePared = altoPared * largoPared;
        cantPintura = ((superficiePared * rendimPintura) * cantManos);
        // Devolucion de datos
        System.out.println("Se van a necesitar "+ cantPintura+ " litros de pintura.");
    }
    
}
