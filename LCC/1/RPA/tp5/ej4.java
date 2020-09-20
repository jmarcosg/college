package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej4 {

    public static void main(String[] args) {
        /*
         * Algoritmo que lee tres valores correspondientes a horas, minutos y 
         * segundos. En base a estos datos muestra la cantidad total en segundos.
         */
        // Declaracion y asignacion de variables
        int horas, minutos, segundos, total;
        // Ingreso y lectura de datos
        System.out.print("Ingrese horas: ");
        horas = TecladoIn.readInt();
        System.out.print("Ingrese minutos: ");
        minutos = TecladoIn.readInt();
        System.out.print("Ingrese segundos: ");
        segundos = TecladoIn.readInt();
        // Calculos
        horas = horas * 3600;
        minutos = minutos * 60;
        total = horas + minutos + segundos;
        // Devolucion de datos
        System.out.println("Cantidad total de segundos: "+total);
    }
    
}
