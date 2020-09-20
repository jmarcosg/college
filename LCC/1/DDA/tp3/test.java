package tp3;
import utiles.TecladoIn;


/**
 *
 * @author kcy0
 */
public class test {
    
    public static void mostrarMatriz(int [][] m){
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        for (fila = 0; fila < cantFilas; fila++){
            for (col = 0; col < cantCol; col++){
                System.out.print (m[fila][col] + " ");
            }
            System.out.println(" ");
        }
    }
    
    
    public static void main (String []args){
        // code testing
        // Declaracion de variables
        int longitudX, longitudY;
        int i;                // Contador que corresponde a X
        int j;                // Contador que corresponde a Y
        int [][] matriz;      // 1er par corchetes = X ; 2do par corchetes = Y
        
        
        // Ingreso y lectura de datos
        System.out.println("Armando la matriz...");
        System.out.print("Ingrese la longitud de X: ");
        longitudX = TecladoIn.readInt();
        System.out.print("Ingrese la longitud de Y: ");
        longitudY = TecladoIn.readInt();
        // Asignacion de longitudes a la matriz
        matriz = new int [longitudX][longitudY];
        // Ingreso de valores a la matriz
        for (i = 0; i < longitudX; i++){
            for (j = 0; j < longitudY; j++){
                System.out.println("Ingrese el elemento de la matriz: ");
                matriz [i][j] = TecladoIn.readInt();
            }
        }
        
        // Devolucion de datos
        System.out.println("Su matriz es:");
        mostrarMatriz(matriz);
        
        
        
    }
    
}
