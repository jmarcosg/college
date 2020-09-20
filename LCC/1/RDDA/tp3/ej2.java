package tp3;


public class ej2 {

	// (a) Cantidad de vocales leídas.
    public static int vocales(char[] arreglo, int longitud) {
        //Declaracion de variables
        int i, cantVocales = 0;
        
        //Verifico si tiene vocales 
        for (i = 0; i < longitud; i++) {
            switch (arreglo[i]) {
                case 'a':
                    cantVocales++;
                    break;
                case 'A':
                    cantVocales++;
                    break;
                case 'e':
                    cantVocales++;
                    break;
                case 'E':
                    cantVocales++;
                    break;
                case 'i':
                    cantVocales++;
                    break;
                case 'I':
                    cantVocales++;
                    break;
                case 'o':
                    cantVocales++;
                    break;
                case 'O':
                    cantVocales++;
                    break;
                case 'u':
                    cantVocales++;
                    break;
                case 'U':
                    cantVocales++;
                    break;
            }
        }
        return cantVocales;
    }
    
    // (b) Cantidad de números leídos.
    public static int numeros (char [] arreglo, int longitud) {
        //Declaracion de variables
        int i, cantNumeros = 0;
        
        //Verifico si tiene numeros
        for (i = 0; i < longitud; i++) {
            if (arreglo[i] >= 0 && arreglo[i] <= 9) {
                cantNumeros++;
            }
        }
        return cantNumeros;
    }
    
    public static void imprimirCartel (String texto, char ch) {
        //La variable texto me permite mostrar un texto personalizado
        if (Character.isLetter(ch)) {
            System.out.println(texto+ch);
        }else {
            int num = (int)ch;
            System.out.println(texto+num);
        }
    }

    public static void main(String[] args) {
        //Declaracion de variables
        char [] arrCaracter = {'a', 5, 'o', 'r', 'h', 3, 7};   //Declaracion del arreglo de caracteres ya predefinido
        int longitud = arrCaracter.length;   //Defino la longitud del arreglo

        //Devolucion de datos
        System.out.println("Cantidad de vocales: "+vocales(arrCaracter, longitud));
        System.out.println("Cantidad de numeros: "+numeros(arrCaracter, longitud));
        
        imprimirCartel("Primer elemento del arreglo: ", arrCaracter[0]);
        imprimirCartel("Elemento del medio del arreglo: ", arrCaracter[((longitud -1) /2)]);
        imprimirCartel("Ultimo elemento del arreglo: ", arrCaracter[(longitud -1)]);
 
        
    }
     
}

  
