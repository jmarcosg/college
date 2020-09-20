package practicaFinal;

import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class contarPares {
    
    public static boolean esPar(int num){
        // Declaracion de variables
        boolean esPar;
        
        // Determina si el num es par (num % 2 == 0)
        if (num % 2 == 0){
            esPar = true;
        } else {
            esPar = false;
        }
        return esPar;
    }
    

    public static void main(String[] args){
        // Declaracion e inicializacion de variables
        int num, cantPares = 0, n, mod = 10, div = 1;

        
        // Ingreso y lectura de datos
        System.out.print("Ingrese un numero entero: ");
        num = TecladoIn.readInt();
        
        // Inicializacion de variables
        String longitudNum = ""+num;

        
        for (int i = 0; i <= longitudNum.length()-1; i++){
            int digito = num % mod / div;
            if (esPar(digito)){
                System.out.print("Es par ");
                cantPares++;
            } else {
                System.out.print("No es par ");
            }
            System.out.print(digito);
            System.out.println();
            mod = mod * 10;  // Al multiplicar por 10 corro la coma 1 lugar a la izquierda
            div = div * 10;
        }
    }
    
}
