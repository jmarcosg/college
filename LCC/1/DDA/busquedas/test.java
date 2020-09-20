package busquedas;
import utiles.TecladoIn;
/**
 *
 * @author kcy0
 */
public class test {
    
    public static int busquedaSecuencial(int [] arreglo, int numBusq){
        int posicion = -1;
        int i;
        int longitudArreglo = arreglo.length;
        
        for (i = 0; i < longitudArreglo; i++){
            if (arreglo[i] == numBusq){
                posicion = i;
            }
        }
        return posicion;
    }
    
    
    public static void bubbleSort(int[] arr){
        int longitudArreglo = arr.length;
        int temp;
        
        for (int i = 0; i < longitudArreglo; i++){
            for(int j = 0; j < (longitudArreglo - i); j++){
                if (arr[j-1] > arr[j]){
                    temp = arr[j-1];
                    arr[j-1] = arr[j];
                    arr[j] = temp;
                }
            }
        }
    }
    
    
    public static int 
    
    
    
    public static void main(String [] args) {
        int [] arreglo = {23,43,1,5,2,22,32,78};
        int numBuscado;
        char opcion;
       
        System.out.println("Ingrese el número a buscar: ");
        numBuscado = TecladoIn.readInt();
        
        
        System.out.println("Opciones: 'a' para busqueda secuencial o 'b' para busqueda binaria.");
        System.out.println("Ingrese 0 para terminar el programa.");
        System.out.println("Ingrese una opcion: ");
        opcion = TecladoIn.readChar();
            
        switch (opcion){
            case 'a':
                bubbleSort(arreglo);
                System.out.println("El numero se encuentra en la posicion: "+busquedaSecuencial(arreglo, numBuscado));
                break;
            case 'b':
                bubbleSort(arreglo);
                System.out.println("El numero se encuentra en la posicion: "+busquedaBinaria(arreglo, numBuscado);
                break;
            default:
                System.out.println("Opcion incorrecta.");
                
        }
    }
}


