package practicaFinal;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class contadorPrimos {
    
    public static int esPrimo(int num){
        // Modulo que verifica si un numero es primo
        int cantidad = 0, i;
        boolean isPrime = true;
        
        //Calculos
        for (i = 2; i <= num / 2; i++){
            if (num % i == 0){
                isPrime = false;
                break;
            }
        }
        
        if (!isPrime){
            cantidad = cantidad + 0;
        } else {
            cantidad++;
        }
        return cantidad;
    }
    
    
    
    public static void main (String [] args){
        // Algortimo principal
        // Declaracion e inicializacion de variables
        int numero, primos=0;
        
        // Ingreso y lectura de datos
        do{
            System.out.println("Ingrese un numero: ");
            numero = TecladoIn.readInt();
            if(numero !=-1)
            primos = primos + esPrimo(numero);
        } while (numero != -1);
        
        // Devolucion de datos
        System.out.println("Cantidad de numeros primos ingresados: " + primos);
        
        
        
    }
    
}
