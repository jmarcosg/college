package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej4 {

    public static void main(String[] args) {
        // Programa que calcula la cantidad de edulcorante por tazas de cafe
        // Declaracion y asignacion de variables
        int gotasEdulcorante, tazasCafe;
        gotasEdulcorante = 8;
        // Ingreso de datos de usuario
        System.out.println("Ingrese cantidad de tazas de cafe a ser consumidas: ");
        // Lectura de datos
        tazasCafe = TecladoIn.readLineInt();
        // Calculo
        gotasEdulcorante = tazasCafe * gotasEdulcorante;
        //Devolucion de datos
        System.out.println("Cantidad de gotas de edulcorante a ser utilizadas: "+ gotasEdulcorante);
        
    }
    
}
