package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej6 {

    public static void main(String[] args) {
        // Programa que convierte y expresa Km en M y Cm
        // Declaracion y asignacion de variables
        double km, m, cm;
        // Ingreso de datos de usuario
        System.out.print("Ingrese cantidad de Km a ser convertidos: ");
        // Lectura de datos
        km = TecladoIn.readLineDouble();
        // Calculo de datos
        m = km * 1000;
        cm = km * 100000;
        // Devolucion de datos
        System.out.println("Km: "+km);
        System.out.println("M: "+m);
        System.out.println("Cm: "+cm);
    }
    
}
