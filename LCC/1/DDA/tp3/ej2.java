package tp3;

import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej2 {

    public static void mostrarMatriz(int[][] m) {
        // Modulo que muestra la matriz completa
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        for (fila = 0; fila < cantFilas; fila++) {
            for (col = 0; col < cantCol; col++) {
                System.out.print(m[fila][col] + " ");
            }
            System.out.println(" ");
        }
    }

    public static boolean esCuadrada(int[][] m) {
        // Modulo que verifica si la matriz es cuadrada
        return m.length == m[0].length;
    }

    public static boolean esTriangularSuperior(int[][] m) {
        // Modulo que verifica si la matriz es Triangular Superior
        boolean continuar;
        continuar = true;
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        fila = 0;
        if (!esCuadrada(m)) {
            continuar = false;
        } else {
            while (fila < cantFilas && continuar) {
                col = 0;
                while (col < cantCol && continuar) {
                    if ((fila > col) && m[fila][col] != 0) {
                        continuar = false;
                    }
                    col++;
                }
                fila++;
            }
        }
        return continuar;
    }

    public static boolean esTriangularInferior(int[][] m) {
        // Modulo que verifica si la matriz es Triangular Inferior
        boolean continuar;
        continuar = true;
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        fila = 0;
        if (!esCuadrada(m)) {
            continuar = false;
        } else {
            while (fila < cantFilas && continuar) {
                col = 0;
                while (col < cantCol && continuar) {
                    if ((col > fila) && m[fila][col] != 0) {
                        continuar = false;
                    }
                    col++;
                }
                fila++;
            }
        }
        return continuar;
    }

    public static boolean esMatrizDiagonal(int[][] m) {
        return esTriangularSuperior(m) && esTriangularInferior(m);
    }

    public static void multiplicarPorEscalar(int[][] m, int k) {
        // Modulo que multiplica un escalar por una matriz
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        for (fila = 0; fila < cantFilas; fila++) {
            for (col = 0; col < cantCol; col++) {
                m[fila][col] = k * m[fila][col];
            }
        }
    }

    public static int[][] transponer(int[][] m) {
        // Modulo que transpone a la matriz
        int[][] mt;
        int fila, col, cantFilas, cantCol;
        cantFilas = m.length;
        cantCol = m[0].length;
        mt = new int[cantCol][cantFilas];
        for (fila = 0; fila < cantFilas; fila++) {
            for (col = 0; col < cantCol; col++) {
                mt[col][fila] = m[fila][col];
            }
        }
        return mt;
    }

    public static int sumarFila(int[][] m, int f) {
        // Modulo que suma una fila de la matriz
        int col, cantCol;
        int suma = 0;
        cantCol = m[0].length;
        for (col = 0; col <= cantCol; col++) {
            suma += m[f][col];
        }
        return suma;
    }

    public static int sumarColumna(int[][] m, int c) {
        // Modulo que suma una columna de la matriz
        int fila, cantFila;
        int suma = 0;
        cantFila = m.length;
        for (fila = 0; fila <= cantFila; fila++) {
            suma += m[fila][c];
        }
        return suma;
    }

    public static void main(String[] args) {
        // Algortimo para armar una matriz de numeros enteros
        // Declaracion de variables
        int longitudN, longitudM, fila, columna, escalar;
        int i;    // Corresponde a N
        int j;    // Corresponde a M
        int[][] matriz;
        int [][] matrizTranspuesta;
        char opcion;

        // Ingreso y lectura de datos
        System.out.println("Ingrese la longitud de N: ");
        longitudN = TecladoIn.readInt();
        System.out.println("Ingrese la longitud de M: ");
        longitudM = TecladoIn.readInt();

        // Armado de matriz
        // Asignacion de longitudes
        matriz = new int[longitudN][longitudM];
        // Ingreso de valores
        for (i = 0; i < longitudN; i++) {
            for (j = 0; j < longitudM; j++) {
                System.out.println("Ingrese el elemento [" + i + "] [" + j + "]");
                matriz[i][j] = TecladoIn.readLineInt();
            }
        }

        // Menu de opciones
        System.out.println("Opciones disponibles");
        System.out.println("Opcion A: Mostrar todos los elementos de la matriz.");
        System.out.println("Opcion B: Verificar si la matriz es cuadrada.");
        System.out.println("Opcion C: Verificar si es Triangular Superior.");
        System.out.println("Opcion D: Verificar si es Matriz Diagonal.");
        System.out.println("Opcion E: Producto por un escalar.");
        System.out.println("Opcion F: Transponer la matriz.");
        System.out.println("Opcion G: Sumar los elementos de una fila.");
        System.out.println("Opcion H: Sumar los elementos de una columna.");
        System.out.println("");
        System.out.println("Opcion a realizar: ");
        opcion = TecladoIn.readChar();
        switch (opcion) {
            case 'a':
                System.out.println("Usted ingreso la opcion A.");
                mostrarMatriz(matriz);
                break;
            case 'b':
                System.out.println("Usted ingreso la opcion B.");
                if (esCuadrada(matriz) == true) {
                    System.out.println("La matriz es cuadrada.");
                } else {
                    System.out.println("La matriz no es cuadrada.");
                }
                break;
            case 'c':
                System.out.println("Usted ingreso la opcion C.");
                if (esTriangularSuperior(matriz) == true) {
                    System.out.println("La matriz es triangular superior.");
                } else {
                    System.out.println("La matriz no es triangular superior.");
                }
                break;
            case 'd':
                System.out.println("Usted ingreso la opcion D.");
                if (esMatrizDiagonal(matriz) == true) {
                    System.out.println("La matriz es diagonal.");
                } else {
                    System.out.println("La matriz no es diagonal.");
                }
                break;
            case 'e':
                System.out.println("Usted elegio la opcion E.");
                System.out.println("Ingrese el escalar: ");
                escalar = TecladoIn.readInt();
                multiplicarPorEscalar(matriz, escalar);
                mostrarMatriz(matriz);
                break;
            case 'f':
                System.out.println("Usted ingreso la opcion F.");
                matrizTranspuesta = transponer(matriz);
                mostrarMatriz(matrizTranspuesta);
                break;
            case 'g':
                System.out.println("Usted elegio la opcion G.");
                System.out.println("Elija la fila a ser sumada: ");
                fila = TecladoIn.readInt();
                sumarFila(matriz, fila);
                break;
            case 'h':
                System.out.println("Usted elegio la opcion H.");
                System.out.println("Elija la columna a ser sumada: ");
                columna = TecladoIn.readInt();
                sumarColumna(matriz, columna);
                break;
        }
    }
}
