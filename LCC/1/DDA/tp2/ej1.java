package tp2;
import utiles.TecladoIn; 

/**
 *
 * @author kcy0
 */
public class ej1 {
    public static void pares (char []arregloLetras,int longit){
        // Modulo que muestra todas las posiciones pares del arreglo
        int i;
        System.out.println("Los elementos en posiciones pares son: ");
        for (i = 0; i < longit; i = i + 2){
            System.out.println(arregloLetras[i] + " ");
        }
    }
    
    
    public static void inverso (char []arregloLetras, int longit){
        // Modulo que muestra el arreglo de forma invertida
        int i;
        System.out.println("El arreglo de forma inversa es: ");
        for (i = longit; i > 0; i--){
            System.out.println(i);
        }
    }
    
    
    public static void cantVeces (char []arregloLetras){
        // Modulo que muestra la cantidad de veces que aparece un caracter
        
    }
    
    
    public static void main (String []args){
        // Algoritmo principal
        // Declaracion de variables
        char letra, opcion;
        char [] arregloLetra;
        int longitud;
        int i = 0;
        boolean charCheck = true; 
        // Ingreso y lectura de datos
        System.out.print("Longitud del arreglo?: ");
        longitud = TecladoIn.readInt();
        // Asignacion de longitud al arreglo
        arregloLetra = new char [longitud];
        /** Verifica si el caracter ingresado es una letra junto a un bucle de
         * repeticion de ingreso de caracteres
         */ 
        do{
            System.out.print("Ingrese un caracter: ");
            letra = TecladoIn.readChar();
            //if (Character.isLetter(letra) = true){
                arregloLetra [i] = letra;
            //} else {
               // System.out.println("El caracter debe ser una letra");
            //} 
            i++;
        } while(i < longitud);
        // Menu de opciones
        System.out.println("Ahora que termino de armar el arreglo.");
        System.out.println("Ingrese una opcion a realizar.");
        System.out.println("Opcion A: Mostrar por pantalla los caracteres de las posiciones pares del arreglo de caracteres.");
        System.out.println("Opcion B: Mostrar por pantalla los caracteres almacenados en el arreglo en orden inverso.");
        System.out.println("Opcion C: Contar cuantas veces aparece un carácter dado.");
        System.out.println("Ingrese una opcion: ");
        opcion = TecladoIn.readChar();
        switch (opcion){
            case 'a': 
                System.out.println("Usted ingreso la opcion A.");
                pares(arregloLetra, longitud);
                break;
            case 'b':
                System.out.println("Usted ingreso la opcion B.");
                inverso(arregloLetra, longitud);
                break;
            case 'c': 
                System.out.println("Usted ingreso la opcion C.");
                cantVeces(arregloLetra);
                break;
            default: 
                System.out.println("ERROR");
                break;
                              
        }
    }
    
}