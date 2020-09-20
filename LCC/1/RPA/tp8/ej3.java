package tp8;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej3 {

    public static String desactivarAlarma(int n){
        // Modulo que se encarga de desactivar la alarma
        String estadoClave = "";
        while (n != 690105){
            System.out.println("ALERTA!");
            System.out.print("Ingrese el codigo de la alarma para desactivarla: ");
            n = TecladoIn.readInt();
            if (n == 690105){
                estadoClave = "Alarma desactivada";
                System.out.println(estadoClave);
            } else {
                estadoClave = "Clave incorrecta";
                System.out.println(estadoClave);
            }           
        }
        return estadoClave;
    }
         
    
    public static void main(String[] args) {
        // Algoritmo para desactivar una alarma
        // Declaracion y asignacion de variables
        int numero;
        String salida;        
        // Ingreso y lectura de datos
        System.out.print("Ingrese un numero para desactivar la alarma: ");
        numero = TecladoIn.readInt();
        // Llamada de modulo
        salida =  desactivarAlarma(numero);
    }
    
}
