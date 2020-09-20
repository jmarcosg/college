package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej9 {

    public static void main(String[] args) {
        // Este algoritmo se encarga de representar una n cantidad de segundos en sus respectivas horas, minutos y segundos
        // Declaracion y asignacion de variables
        int num, hs, min, seg;
        // Ingreso y lectura de datos del usuario
        System.out.print("Ingrese un numero a ser convertido: ");
        num = TecladoIn.readLineInt();
        // Calculos
        hs = num/3600;
        min = (num-(3600*hs))/60;
        seg = num-((hs*3600) + (min*60));
        // Devolucion de datos
        System.out.println(hs+"hs "+ min+"min "+ seg+"seg ");
    }
    
}
