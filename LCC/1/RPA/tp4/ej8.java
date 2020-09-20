package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej8 {

    public static void main(String[] args) {
        // Este algoritmo realiza el intercambo de valores almacenados en dos variables entre si
        // Declaracion y asignacion de variables
        int a,b;
        // Ingreso y lectura de datos de usuario
        System.out.print("Ingrese numero a: ");
        a = TecladoIn.readLineInt();
        System.out.print("Ingrese numero b: ");
        b = TecladoIn.readLineInt();
        // Calculo
        a = a + b;
        b = a - b;
        a = a - b;
        // Devolucion de datos
        System.out.println("Ahora el valor para a es: "+a);
        System.out.println("Ahora el valor para b es: "+b);
    }
    
}
