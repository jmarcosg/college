package tp3;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej1 {
    
    public static void mostarFila(int [][] m, int f){
        // Modulo que muestra la fila enesima de la matriz
        int i;
        for (i = 0; i < m[f-1].length; i++){
            if (i > 0){
                System.out.print(", ");
            }
            System.out.print(m[f-1][i]);
        }
    }
    
    public static void mostrarMatriz(int [][] m){
        // Modulo que muestra la matriz completa
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
    
    public static void mostrarColumna(int [][]m, int c){
        // Modulo que muestra la columna iesima de la matriz
        int j;
        for (j = 0; j < m[c-1].length; j++){
            if (j > 0){
                System.out.println(" ");
            }
            System.out.println(m[j][c-1]);
        }
    }
    
    public static void main (String []args){
        // Algoritmo para armar una matriz de numeros enteros
        // Declaracion de variables
        int longitudN, longitudM, fila, columna;
        int i;               // Coresponde a N
        int j;               // Corresponde a M
        int [][] matriz;     // 1er par corresponde a N, 2do a Y
        char opcion;
        
        // Ingreso y lectura de datos
        System.out.print("Ingrese la longitud de N: ");
        longitudN = TecladoIn.readInt();
        System.out.print("Ingrese la longitud de M: ");
        longitudM = TecladoIn.readInt();
        
        // Armado de matriz
        // Asisgnacion de longitudes
        matriz = new int [longitudN][longitudM];
        // Ingreso de valores
        for (i = 0; i < longitudN; i++){
            for (j = 0; j < longitudM; j++){
                System.out.println("Ingrese el elemento: ");
                matriz [i][j] = TecladoIn.readLineInt();
            }
        }
        
        // Menu de opciones
        System.out.println("Opciones disponibles.");
        System.out.println("Opcion A: Cargar la fila i-esima de la matriz.");
        System.out.println("Opcion B: Cargar la matriz entera en base a la opcion A.");
        System.out.println("Opcion C: Cargar la columna i-esima de la matriz.");
        System.out.println("Opcion D: Cargar la matriz entera en base a la opcion C.");
        System.out.println("Opcion E: Realizar todas la anteriores.");
        System.out.println(" ");
        System.out.println("Opcion a realizar: ");
        opcion = TecladoIn.readChar();
        switch (opcion){
            case 'a':
                System.out.println("Usted ingreso la opcion A.");
                System.out.println("Ingrese la fila a mostar: ");
                fila = TecladoIn.readInt();
                mostarFila(matriz, fila);
                break;
            case 'b':
                System.out.println("Usted ingreso la opcion B.");
                mostrarMatriz(matriz);
                break;
            case 'c':
                System.out.println("Usted ingreso la opcion C.");
                System.out.println("Ingrese la columna a mostar: ");
                columna = TecladoIn.readInt();
                mostrarColumna(matriz, columna);
                break;
            case 'd':
                System.out.println("Usted ingreso la opcion D.");
                mostrarMatriz(matriz);
                break;
            case 'e':
                System.out.println("Usted ingreso la opcion E.");
                System.out.println("Ingrese la fila a mostar: ");
                fila = TecladoIn.readInt();
                mostarFila(matriz, fila);
                System.out.println("Ingrese la columna a mostar: ");
                columna = TecladoIn.readInt();
                mostrarColumna(matriz, columna);
                mostrarMatriz(matriz); 
        }
    }
    
}
