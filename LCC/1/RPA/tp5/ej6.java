package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej6 {

    public static void main(String[] args) {
        // Algoritmo que hace de reloj despertador
        // Declaracion y asignacion de variables
        int hora;
        char diaSemana;
        boolean despertar;
        // Ingreso y lectura de datos
        System.out.print("Ingrese la inicial del dia de la semana: ");
        diaSemana = TecladoIn.readChar();
        System.out.print("Ingrese hora: ");
        hora = TecladoIn.readInt();
        // Calculo
        despertar = ((diaSemana == 'l') || (diaSemana == 'j')) && (hora >= 7);
        // Devolucion de datos
        System.out.println("Tendrias que levantarte: "+despertar);
    }
    
}
