package ejerciciosClase;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class cantidadCifras {
   
    public static int calcular(int n){
        /* Modulo que calcula la cantidad de cifras de un numero entero.
         * n: numero entero.
         * cifras: contador.
         */
        int cifras = 0;
        // Calculo de cantidad de cifras
        while (n!=0){
            n = n/10;
            cifras++;
        }
        return cifras;    
    }
   
    
    public static void main(String[] args) {
        // Algoritmo que calcula el numero de cifras de un numero entero.
        // Declaracion y asignacion de variables.
        int numero;
        // Ingreso y lectura de datos
        System.out.print("Ingrese un numero entero: ");
        numero = TecladoIn.readInt();
        // Devolucion de datos
        System.out.println("El numero ingresado tiene "+ calcular(numero) + " cifras.");
    }
    
}
