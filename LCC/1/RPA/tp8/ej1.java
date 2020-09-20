package tp8;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej1 {
    
    public static int tablaMultiplicar(int n){
        // Modulo que realiza los calculos de la tabla de multiplicar y la imprime
        // Declaracion de variables
        // n entero
        int calculo = 0;
        int i = 1;                                                              // Contador
        while (i <= 10){
            calculo = n * i;
            System.out.println(n+" x " + i + " = " + calculo);
            i++;
        }
        return calculo;
    }
    
       
    public static void main(String[] args) {
        // Algoritmo que imprime una tabla de multiplicar hasta el numero 10
        // Declaracion y asignacion de variables
        int numero, salida;
        // Ingreso y lectura de datos
        System.out.print("Ingrese un numero: ");
        numero = TecladoIn.readInt();
        // Llamada al modulo
        salida = tablaMultiplicar(numero);
        
    }
    
}
