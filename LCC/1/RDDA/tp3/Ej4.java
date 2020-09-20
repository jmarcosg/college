package tp3;


public class Ej4 {
	
	public static int fibonacci (int [] arr, int longitud, long [] susFibonacci) {
        //Declaracion de variables
        int i, j, cantIguales = 0;

        //Verifico elemento por elemento si hay alguno parecido al arreglo de Fibonacci
        for (i = 0; i < longitud; i++) {
            for (j = 0; j < longitud; j++) {
                if (arr[i] == susFibonacci[j]) {
                	cantIguales++;
                }
            }
        }
        return cantIguales;
    }
    
    public static void main (String [] args) {
        //Declaracion e inicializacion de variables
        int [] arreglo = {1, 6, 10, 24, 35, 80, 143};  //Arreglo predefinido de numeros enteros        
        int longitud = arreglo.length;    //Defino la longitud del arreglo
        long [] sucesionFibonaccci = new long [arreglo.length];   //La secuencia de Fibonacci va a compartir la misma longitud que el arreglo. No importa el largo del mismo, siempre va a poder comparar con la sucesion  
        int cantNum, i;
        boolean hayNum;
        sucesionFibonaccci[0] = 0;
        sucesionFibonaccci[1] = 1;    //Dejo predefinidos los primeros dos elementos de la sucesion de Fibonacci para que pueda empezar a armar el arreglo

        
        // Armo el arreglo con la sucesion de Fibonacci
        for (i = 2; i < longitud; i++) {
        	sucesionFibonaccci[i] = sucesionFibonaccci[i -1] + sucesionFibonaccci[i - 2];
        }
        
        
        //Invoco el modulo para comprar al arreglo con la sucesion
        cantNum = fibonacci(arreglo, longitud, sucesionFibonaccci);
        
   
        //Verifico si hay numeros de la sucesion de Fibonacci
        if (cantNum > 0) {
            hayNum = true;
            System.out.println("Hay numeros de la sucesion de Fibonacci? "+hayNum);
        }else {
            hayNum = false;
            System.out.println("Hay numeros de la sucesion de Fibonacci? "+hayNum);
        }
            
    }
    
}
