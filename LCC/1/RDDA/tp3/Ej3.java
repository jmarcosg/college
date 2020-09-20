package tp3;

public class Ej3 {

    public static int pares(int arreglo[], int longitud) {
        //Declaracion de variables
        int i, sumaPares = 0;

        //Verifico la posicion de los numeros pares y los sumo
        for (i = 0; i < longitud; i++) {
            if (i % 2 == 0) {     
                sumaPares = sumaPares + arreglo[i];
            }
        }
        return sumaPares;
    }

    public static int impares (int arreglo[], int longitud) {
        //Declaracion de variables
        int i, sumaImpares = 0;

        //Verifico la posicion de los numeros impares y los sumo
        for (i = 0; i < longitud; i++) {
            if (i % 2 == 1) {
                sumaImpares = sumaImpares + arreglo[i];
            }
        }
        return sumaImpares;
    }

    public static void main(String[] args) {
        //Declaracion de variables
        int[] arrNumeros = {1, 5, 11, 6, 4, 7, 2};  //Declaracion del arreglo de numeros ya predefinido
        int longitud = arrNumeros.length;   //Defino la longitud
        int sumaPares, sumaImpares;
        boolean sonIguales;
        
        //Invoco los modulos
        sumaPares = pares(arrNumeros, longitud);
        sumaImpares = impares(arrNumeros, longitud);
        
        //Devolucion de datos
        System.out.println("Suma de elementos en posicion par: "+sumaPares);
        System.out.println("Suma de elemento en posicion impar: "+sumaImpares);

        //Verifico si son iguales o no
        if (sumaPares == sumaImpares) {
            sonIguales = true;
            System.out.println("Son iguales? " + sonIguales);
        } else {
            sonIguales = false;
            System.out.println("Son iguales? " + sonIguales);
        }
    }

}
