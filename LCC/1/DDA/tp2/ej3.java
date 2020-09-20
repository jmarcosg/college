package tp2;
import utiles.TecladoIn;

/**
 *
 * @author alumno
 */
public class ej3 {
    public static void main (String []args){
        /**
         * Algoritmo que lee un arreglo de palabras, un numero (posicion) y 
         * luego devuelve la palabra en posicion
         */
         // Declaracion de variables
         int posicion, longitud;
         int i=0;
         String [] arregloPalabra;
         String palabra;
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
         System.out.print("Ingrese una posicion del arreglo: ");
         posicion = TecladoIn.readInt();
         if (posicion > longitud || posicion < 0){
             System.out.println("Posicion invalida");
         } else {
             System.out.println("Su palabra es: "+arregloPalabra[posicion]);
         }         
    }    
}