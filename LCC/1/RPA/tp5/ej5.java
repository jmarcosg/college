package tp5;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej5 {

    public static void main(String[] args) {
        /* 
         * Este algoritmo determina si un estudiante (con true o false) aprueba
         * la materia Biología I.
         */
        //Declaracion y asignacion de variables
        int primCalif, segCalif, terCalif;
        boolean aprPrim, aprSeg, aprTer, aprMat;
        // Ingreso y lectura de datos
        System.out.print("Ingrese la primer calificacion: ");
        primCalif = TecladoIn.readInt();
        System.out.print("Ingrese la segunda calificacion: ");
        segCalif = TecladoIn.readInt();
        System.out.print("Ingrese la tercer calificacion: ");
        terCalif = TecladoIn.readInt();
        // Calculos
        aprPrim = (primCalif >= 60);
        aprSeg = (segCalif >= 60);
        aprTer = (terCalif >= 60);
        aprMat = aprPrim && aprSeg && aprTer;
        // Devolucion de datos
        System.out.println("El estudiante esta aprobado: "+aprMat);
    }
    
}
