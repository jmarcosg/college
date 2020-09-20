package tp3;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej3 {

    public static void mostrarMatriz(int[][] m) {
        // Modulo que muestra la matriz completa
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        for (fila = 0; fila < cantFilas; fila++){
            for (col = 0; col < cantCol; col++){
                System.out.print(m[fila][col] + " ");
            }
            System.out.println(" ");
        }
    }
    
    public static void mostrarMatrices(int[][] m1, int[][] m2){
        // Modulo que muestra los elementos de las dos matrices
        int fila1, fila2, col1, col2, cantFilas1, cantFilas2, cantCol1, cantCol2;
        cantFilas1 = m1.length;
        cantCol1 = m1[0].length;
        cantFilas2 = m2.length;
        cantCol2 = m2[0].length;
        System.out.println("Matriz 1: ");
        for (fila1 = 0; fila1 < cantFilas1; fila1++){
            for (col1 = 0; col1 < cantCol1; col1++){
               System.out.print(m1[fila1][col1] + " ");
            }
            System.out.println(" ");
        }
        System.out.println("Matriz 2: ");
        for (fila2 = 0; fila2 < cantFilas2; fila2++){
            for (col2 = 0; col2 < cantCol2; col2++){
               System.out.print(m2[fila2][col2] + " ");
            }
            System.out.println(" ");
        }
    }
    
    public static int[][] sumarMatrices(int[][] a, int[][] b) {
        // Modulo que suma dos matrices
        int[][] c;
        int i, j, cantFilas, cantCol;
        cantFilas = a.length;
        cantCol = a[0].length;
        c = new int[cantFilas][cantCol];
        for (i = 0; i < cantFilas; i++) {
            for (j = 0; j < cantCol; j++) {
                c[i][j] = a[i][j] + b[i][j];
            }
        }
        return c;
    }

    public static int[][] multiplicarMatrices(int[][] a, int[][] b) {
        // Modulo que multiplica dos matrices
        int[][] c = new int[a.length][b[0].length];
        int i, j, k, cantFilasA, cantColA, cantColB;
        int suma = 0;
        cantFilasA = a.length;
        cantColA = a[0].length;
        cantColB = b[0].length;
        for (i = 0; i < cantFilasA; i++) {
            for (j = 0; j < cantColB; j++) {
                for (k = 0; k < cantColA; k++) {
                    suma += a[i][k] * b[k][j];
                }
                c[i][j] = suma;
            }
        }
        return c;
    }

    public static void main(String[] args) {
        // Algoritmo ppal
        // Declaracion de variables
        int longitudN, longitudM, longitudX, longitudY;
        int i, j;   // Corresponde a m1
        int x, y;   // Corresponde a m2
        int[][] matriz1;
        int[][] matriz2;
        int[][] matrizS;     // Matriz sumada
        int[][] matrizM;     // Matriz multiplicada 
        char opcion;

        // Ingreso y lectura de datos
        System.out.println("Matriz 1");
        System.out.print("Ingrese la longitud de N: ");
        longitudN = TecladoIn.readInt();
        System.out.print("Ingrese la longitud de M: ");
        longitudM = TecladoIn.readInt();
        System.out.println("Matriz 2");
        System.out.print("Ingrese la longitud de N: ");
        longitudX = TecladoIn.readInt();
        System.out.print("Ingrese la longitud de M: ");
        longitudY = TecladoIn.readInt();

        // Armado de matriz
        // Asignacion de longitudes
        matriz1 = new int[longitudN][longitudM];
        matriz2 = new int[longitudX][longitudY];

        // Menu de opciones
        System.out.println("");
        System.out.println("Opciones disponibles");
        System.out.println("Opcion A: Cargar los datos de las matrices.");
        System.out.println("Opcion B: Sumar las dos matrices.");
        System.out.println("Opcion C: Realizar el producto de las matrices.");
        System.out.println("Presionar F para terminar el programa.");
        System.out.println("");
        do {
            System.out.println("Ingrese opcion: ");
            opcion = TecladoIn.readChar();
            switch (opcion) {
                case 'a':
                    System.out.println("Carga elementos matriz 1");
                    for (i = 0; i < longitudN; i++) {
                        for (j = 0; j < longitudM; j++) {
                            System.out.println("Ingrese el elemento [" + i + "] [" + j + "]");
                            matriz1[i][j] = TecladoIn.readLineInt();
                        }
                    }
                    System.out.println("Carga elementos matriz 2");
                    for (x = 0; x < longitudX; x++) {
                        for (y = 0; y < longitudY; y++) {
                            System.out.println("Ingrese el elemento [" + x + "] [" + y + "]");
                            matriz2[x][y] = TecladoIn.readLineInt();
                        }
                    }
                    mostrarMatrices(matriz1, matriz2);
                    break;
                case 'b':
                    if ((matriz1.length == matriz2.length) && (matriz1[0].length == matriz2[0].length)) {
                        matrizS = sumarMatrices(matriz1, matriz2);
                        mostrarMatriz(matrizS);
                    } else {
                        System.out.println("No se pueden sumar.");
                    }
                    break;
                case 'c':
                    if (matriz1[0].length == matriz2.length) {
                        matrizM = multiplicarMatrices(matriz1, matriz2);
                    } else {
                        System.out.println("No se pueden multiplicar.");
                    }
                    //mostrarMatriz(matrizM);
                    break;
            }
        } while (opcion != (-1));   
    }
}