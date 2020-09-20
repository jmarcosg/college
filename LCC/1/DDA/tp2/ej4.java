package tp2;
import java.util.Arrays;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej4 {
    public static int buscoPosicion(String [] arrayPalabra, String busquedaPalabra){
        // Modulo que se encarga de buscar la posicion de una palabra
        int i = 0;
        int pos = -1;
        boolean encontrado = false;
        while (i < arrayPalabra.length && !encontrado){
            if (busquedaPalabra.equalsIgnoreCase(arrayPalabra[i])){
                encontrado = true;
                pos = i;
            } else {
                i++;
            }
        }
        return pos;
    }
    
    
    
    public static void main(String []args){
        /** Algoritmo que lee un arreglo de palabras y una cadena de caracteres.
         * Se ingresa una palabra para vericar su existencia en el mismo y 
         * devuelve su posicion
         */
        // Declaracion de variables
        int posicion, longitud;
        int i=0;
        String [] arregloPalabra;
        String palabra, buscoPalabra;
        // boolean palabraEncontrada;
        // Ingreso y lectura de datos
        System.out.print("Ingrese la longitud del arreglo: ");
        longitud = TecladoIn.readInt();
        // Asignacion de longitud al arreglo
        arregloPalabra = new String [longitud];
        do{
            System.out.print("Ingrese una palabra: ");
            palabra = TecladoIn.readLine();
            arregloPalabra [i] = palabra;
            i++;
        } while (i < longitud);
        // Busqueda de palabra en el array
        System.out.print("Ingrese una palabra a buscar en el arreglo: ");
        buscoPalabra = TecladoIn.readLine();
        if (Arrays.asList(arregloPalabra).contains(buscoPalabra)){
            System.out.println("La palabra " + buscoPalabra + " se encuentra en la posicion: " + buscoPosicion(arregloPalabra, buscoPalabra));
        } else {
            System.out.println("La palabra: '" + buscoPalabra + "' no se encuentra dentro del arreglo.");
        }    
    }
}
