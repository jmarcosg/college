package contextoRugby;

import utiles.TecladoIn;

public class ej2 {

    public static void Menu() {
        // Modulo que muestra el menu de opciones a realizar para el usuario
        System.out.println("________________________");
        System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
        System.out.println("");
        System.out.println("1: Ingresar una escuela y mostrar las letras asignadas.");
        System.out.println("2. Ingresar una categoria y letra para ver si corresponde a una escuela.");
        System.out.println("3. Generar una cadena con todos los grupos (ordenado por escuela).");
        System.out.println("4. Mostrar los elementos de la matriz con recorrido espiral.");
        System.out.println("5. Cambiar vocales por '*'.");
        System.out.println("0. Terminar el programa.");
        System.out.println("________________________");
        System.out.print("Ingrese una opcion a realizar: ");
    }

    public static void cargarArreglo(char[][] arreglo) {
        // Modulo que se encarga de cargar elementos al arreglo
        int fila, col;

        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                System.out.println("Ingrese un elemento para la posicion [" + fila + "," + col + "]: ");
                arreglo[fila][col] = TecladoIn.readLineNonwhiteChar();
                Character.toUpperCase(arreglo[fila][col]);
            }
        }
    }

    public static String categorias(int pos) {
        // Modulo que almacena las categorias de rugby
        String texto = "";

        switch (pos) {
            case 0:
                texto = "M4";
                break;
            case 1:
                texto = "M6";
                break;
            case 2:
                texto = "M7";
                break;
            case 3:
                texto = "M8";
                break;
            case 4:
                texto = "M10";
                break;
        }
        return texto;
    }

    public static String escuelas(int pos) {
        // Modulo que almacena las escuelas de rugby
        String texto = "";

        switch (pos) {
            case 0:
                texto = "Los Patos";
                break;
            case 1:
                texto = "Marabunta";
                break;
            case 2:
                texto = "Roca Rugby Club";
                break;
            case 3:
                texto = "Neuquen Rugby Club";
                break;
            case 4:
                texto = "Allen Rugby Club";
                break;
        }
        return texto;
    }

    public static void letrasEscuela(char[][] arreglo, String palabraBuscada) {
        //Modulo que busca una escuela en el arreglo y dsp imprime las letras de esa fila
        int fila, col;
        int posFila = 0;

        // Recorro el arreglo para encontrar la fila que corresponde a la palabra ingresada
        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                if (palabraBuscada.equals(escuelas(fila))) {
                    posFila = fila;
                }
            }
        }

        // Imprimo la fila correspondiente
        for (fila = 0; fila < arreglo[posFila].length; fila++) {
            System.out.print(arreglo[posFila][fila]);
        }
        System.out.println(" ");
    }

    public static void categoriaLetra(char[][] arreglo, String categoriaBuscada, char letraBuscada) {
        // Ingresar una categoria y letra para ver si corresponde a una escuela
        int fila, col;
        int posFila = 0; // posCol = 0;
        boolean existeCategoria = false, existeLetra = false;

        // Recorro el arreglo buscando las posiciones en las que se podrian encontrar la cateoria y la letra ingresada
        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                if ((categoriaBuscada.equals(categorias(col)))) {
                    existeCategoria = true;
                    // posCol = col;
                }
                if (letraBuscada == arreglo[fila][col]) {
                    existeLetra = true;
                    posFila = fila;
                }
            }
        }

        // Si ambas condiciones son verdaderas se muestra la escuela a la que corresponde
        if ((existeCategoria == true) && (existeLetra == true)) {
            System.out.println("La categoria y letra ingresada corresponde a: " + escuelas(posFila));
        } else {
            System.out.println("La categoria o letra no son correctas.");
        }
    }

    public static void cambiarVocales(char[][] arreglo) {
        // Modulo que cambia vocales por *
        int fila, col;

        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                switch (arreglo[fila][col]) {
                    case 'A':
                        arreglo[fila][col] = '*';
                        break;
                    case 'a':
                        arreglo[fila][col] = '*';
                        break;
                    case 'E':
                        arreglo[fila][col] = '*';
                        break;
                    case 'e':
                        arreglo[fila][col] = '*';
                        break;
                    case 'I':
                        arreglo[fila][col] = '*';
                        break;
                    case 'i':
                        arreglo[fila][col] = '*';
                        break;
                    case 'O':
                        arreglo[fila][col] = '*';
                        break;
                    case 'o':
                        arreglo[fila][col] = '*';
                        break;
                    case 'U':
                        arreglo[fila][col] = '*';
                        break;
                    case 'u':
                        arreglo[fila][col] = '*';
                        break;
                }
            }
        }

        for (fila = 0; fila < arreglo.length; fila++) {
            for (col = 0; col < arreglo[fila].length; col++) {
                System.out.print(arreglo[fila][col]);
            }
        }
        System.out.println(" ");
    }

    public static void grupoEscuelaOrdenado(char[][] arreglo) {
        // Modulo que muestra una cadena con todos los grupos ordenados por escuela
        int fila; //col;
        int allen = 4, losPatos = 0, marabunta = 1, nrc = 3;
        int rrc = 2;

        System.out.println("Allen Rugby Club");
        for (fila = 0; fila < arreglo[allen].length; fila++) {
            System.out.print(arreglo[allen][fila]);
        }
        System.out.println(" ");
        System.out.println("Los Patos");
        for (fila = 0; fila < arreglo[losPatos].length; fila++) {
            System.out.print(arreglo[losPatos][fila]);
        }
        System.out.println(" ");
        System.out.println("Marabunta");
        for (fila = 0; fila < arreglo[marabunta].length; fila++) {
            System.out.print(arreglo[marabunta][fila]);
        }
        System.out.println(" ");
        System.out.println("Neuquen Rugby Club");
        for (fila = 0; fila < arreglo[nrc].length; fila++) {
            System.out.print(arreglo[nrc][fila]);
        }
        System.out.println(" ");
        System.out.println("Roca Rugby Club");
        for (fila = 0; fila < arreglo[rrc].length; fila++) {
            System.out.print(arreglo[rrc][fila]);
        }
        System.out.println(" ");
    }

    public static void arregloEnEspiral(char[][] arreglo) {
        // Modulo que imprime una matriz de forma en espiral
        int inicioFila = 0, inicioCol = 0, finFila = arreglo.length, finCol = arreglo.length, i;

        while ((inicioFila < finFila) && (inicioCol < finCol)) {
            // Imprime la primer fila de las filas restantes
            for (i = inicioCol; i < finCol; i++) {
                System.out.print(arreglo[inicioFila][i] + " ");
            }
            inicioFila++;
            // Imprime la ultima columna de las columnas restantes
            for (i = inicioFila; i < finFila; i++) {
                System.out.print(arreglo[i][finCol - 1] + " ");
            }
            finCol--;
            // Imprime la ultima fila de las filas restantes con paso -1
            if (inicioFila < finFila) {
                for (i = finCol - 1; i >= inicioCol; i--) {
                    System.out.print(arreglo[finFila - 1][i] + " ");
                }
                finFila--;
            }
            // Imprime la primer columna de las columnas restantes con paso -1
            if (inicioCol < finCol) {
                for (i = finFila - 1; i >= inicioFila; --i) {
                    System.out.print(arreglo[i][inicioCol] + " ");
                }
                inicioCol++;
            }
        }
        System.out.println(" ");
    }

    public static void main(String[] args) {
        // Algoritmo ppal
        // Declaracion e inicializacion de variables
        char arreglo[][] = new char[5][5];
        int opcion = -1;
        String escuela, categoria;
        char letra;

        // Carga de elementos en el arreglo
        cargarArreglo(arreglo);

        // Menu de opciones
        do {
            Menu();
            opcion = TecladoIn.readInt();
            switch (opcion) {
                case 1:
                    System.out.println("Usted eligio la opcion 1.");
                    System.out.println("Ingrese una escuela: ");
                    escuela = TecladoIn.readLine();
                    letrasEscuela(arreglo, escuela);
                    break;
                case 2:
                    System.out.println("Usted eligio la opcion 2.");
                    System.out.println("Ingrese una categoria: ");
                    categoria = TecladoIn.readLine();
                    System.out.println("Ingrese una letra: ");
                    letra = TecladoIn.readLineNonwhiteChar();
                    categoriaLetra(arreglo, categoria, letra);
                    break;
                case 3:
                    System.out.println("Usted eligio la opcion 3.");
                    grupoEscuelaOrdenado(arreglo);
                    break;
                case 4:
                    System.out.println("Usted eligio la opcion 4.");
                    arregloEnEspiral(arreglo);
                    break;
                case 5:
                    System.out.println("Usted eligio la opcion 5.");
                    cambiarVocales(arreglo);
                    break;
            }
        } while (opcion != 0);
        if (opcion == 0) {
            System.out.println("Programa finalizado.");
        }
    }

}