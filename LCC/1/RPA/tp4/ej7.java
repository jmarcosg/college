package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej7 {

    public static void main(String[] args) {
        // Este algoritmo se encarga de leer un numero de tres cifres y descomponerlo en  unidades, decenas y centenas
        // Declaracion y asignacion de variables
        int numero, unidades, decenas, centenas;
        // Ingreso y lectura de datos del usuario
        System.out.print("Escriba un numero: ");
        numero = TecladoIn.readLineInt();
        // Calculos de descomposiciones de unidades
        centenas = numero / 100;
        decenas = (numero - (centenas*100))/10;
        unidades = (numero - (centenas*100 + decenas*10));
        // Devolucion de datos
        System.out.println("Centenas: "+centenas);
        System.out.println("Decenas: "+decenas);
        System.out.println("Unidades: "+unidades);
    }
    
}