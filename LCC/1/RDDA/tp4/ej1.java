package tp4;
import utiles.TecladoIn;
import java.util.Arrays;

public class ej1 {
	
	
	public static int verificarPrimos(int[] codigo) {
        // Modulo que verifica si el codigo ingresado tiene al menos 2 numeros primos
        int cantidad = 0, i, j;
        int longitud = codigo.length;
        boolean esPrimo = false;

        //Calculos
        for (i = 0; i < longitud; i++) {    // Recorro el arreglo elemento por elemento
            if (codigo[i] == 1) {
                esPrimo = false;
            } else {
                for (j = 2; j <= codigo[i] / 2; j++) {     // Busco si tiene divisores desde 2 hasta si mismo 
                    if (codigo[i] % j == 0) {
                        esPrimo = true;
                        break;
                    }
                }
            }

            if (esPrimo) {
                cantidad = cantidad + 0;
            } else {
                cantidad++;
            }

        }
        return cantidad;
    }

    public static int[] asigArrNuevo(int[] codigo) {
        // Modulo que asigna los elementos del codigo viejo al nuevo en las posiciones pares
        int i, j = 0, aux;
        int longitud = codigo.length;
        int longitudCodigoNuevo = (longitud * 2);
        int[] codigoNuevo;
        codigoNuevo = new int[longitudCodigoNuevo];

        // Asignacion de los elementos viejos al arreglo nuevo en las posiciones pares
        for (i = 0; i < longitud; i++) {
            aux = codigo[i];
            codigoNuevo[j] = aux;
            j = j + 2;
        }

        return conversionCN(codigoNuevo, longitudCodigoNuevo);
    }

    public static int[] conversionCN(int[] codigoNuevo, int longitudNueva) {
        // Modulo que convierte un codigo en uno mas codificado codificadamente con una codificacion codificable
        int i, calculo;
        // Busco a los elementos en posiciones impares
        for (i = 1; i < longitudNueva; i = i + 2) {
            calculo = (codigoNuevo[i - 1] + 5) * 3;   // Para los elementos en las posiciones impares realizo la operacion correspondiente al ejercicio
            codigoNuevo[i] = calculo;
        }

        return codigoNuevo;
    }

    public static int entre20Y40(int[] codigoNuevo) {
        // Modulo que busca a los elementos en el codigo nuevo que estan dentro del intervalo 20-40
        int i, numerosIntervalo = 0;
        int longitudNueva = codigoNuevo.length;

        // Busqueda y conteo de los elementos dentro del intervalo
        for (i = 0; i < longitudNueva; i++) {
            if (codigoNuevo[i] > 20 && codigoNuevo[i] < 40) {
                numerosIntervalo++;
            }
        }
        return numerosIntervalo;
    }

    public static void main(String[] args) {
        // Algoritmo principal donde esta el codigo de usuario original
        //int[] arregloCodigo = {3, 5, 7, 11};     // Dejo el codigo ya predefinido
        int primos, i, longitud;
        int [] arregloCodigo;
        
        System.out.print("Ingrese la longitud del arreglo: ");
        longitud = TecladoIn.readInt();
        arregloCodigo = new int [longitud];
        
        for (i = 0; i < longitud; i++) {
            System.out.print("Ingrese un elemento para la posicion "+i+": ");
            arregloCodigo[i] = TecladoIn.readLineInt();
        }
        
        // Asigno el modulo de verificacion de primos a la variable para luego utilizarla como demostracion de cuantos hay en el arreglo original
        primos = verificarPrimos(arregloCodigo);

        // Muestro el codigo original
        System.out.println("Codigo usuario: " + Arrays.toString(arregloCodigo));

        // Serie de prints donde se muestra cada una de las operaciones que se realizaron
        if (primos >= 2) {
            System.out.println("Codigo nuevo: " + Arrays.toString(asigArrNuevo(arregloCodigo)));
            System.out.println("Cantidad de numeros primos: " + primos);
            System.out.println("Cantidad de numeros entre 20 y 40: " + entre20Y40(asigArrNuevo(arregloCodigo)));
        } else {
            System.out.println("No hay suficientes numeros primos en el arreglo.");
        }

    }

}
