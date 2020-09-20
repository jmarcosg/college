package tp5;
import java.lang.Math.*;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */

public class ej1 {

    public static void main(String[] args) {
        // Este algoritmo se encarga de calcular el perimetro de un circulo
        // Declaracion y asignacion de variables
        double radio, perimetro;
        // Ingreso y lectura de datos de usuario
        System.out.print("Ingrese el radio de la circunferencia: ");
        radio = TecladoIn.readLineDouble();
        // Calculos
        perimetro = (radio * radio) * Math.PI;
        // Devolucion de datos
        System.out.println("Perimetro de la circunferencia: "+perimetro);        
    }    
}