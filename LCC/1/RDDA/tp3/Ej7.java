package tp3;


public class Ej7 {
    
	public static boolean esVocal(char ch) {
        boolean esVocal;
        switch (ch) {
            case 'a':
                esVocal = true;
                break;
            case 'A':
            	esVocal = true;
            	break;
            case 'e':
                esVocal = true;
                break;
            case 'E':
            	esVocal = true;
            	break;
            case 'i':
                esVocal = true;
                break;
            case 'I':
            	esVocal = true;
            	break;
            case 'o':
                esVocal = true;
                break;
            case 'O':
            	esVocal = true;
            	break;
            case 'u':
                esVocal = true;
                break;
            case 'U':
            	esVocal = true;
            	break;
            default:
                esVocal = false;
                break;
        }
        return esVocal;
    }
    
    public static String [] chauVocales (String [] arreglo) {
        //Declaracion de variables
        String [] nuevoArreglo;   //Declaracion del nuevo arreglo String 
        String palabra, nuevaPalabra;
        int i, j;
        
        nuevoArreglo = new String [arreglo.length];   //Creacion del nuevo arreglo String 
        
        for(i = 0; i <= arreglo.length - 1; i++) {
            palabra = arreglo[i];
            //Solamente borro las vocales si la longitud de la palabra es mayor a 5
            if (palabra.length() > 5) {
                //Elimino las vocales y genero una nueva palabra
                nuevaPalabra = "";    //Genero una nueva palabra sin vocales
                for (j = 0; j <= palabra.length() - 1; j++) {
                    if (!esVocal(palabra.charAt(j))) {   //Si no es una vocal entoces guardo el caracter sino no guardo nada
                        nuevaPalabra = nuevaPalabra + palabra.charAt(j);   //Guarda el caracter que no es vocal 
                    }
                }
            }else {
                nuevaPalabra = arreglo[i];    //No modifico el nombre
            }
            nuevoArreglo[i] = nuevaPalabra;   //Retorna los nombres modificados sin las vocales o sin modificar 
        }
        return nuevoArreglo;
    }
    
    public static void mostrarElemento (String [] arreglo) {
        for (int i = 0; i <= arreglo.length - 1; i++) {
            System.out.println(arreglo[i]);
        }
    }

    public static void main (String[] args) {
        //Declaracion de variables
        String[] arrNombre = {"Faustino", "Roberto", "Pedro", "Juan", "Valeria", "Matias", "Alberto"};   //Declaracion del arreglo de nombres ya predefinido
                
        //Invoco los modulos
        mostrarElemento(chauVocales(arrNombre));
        
    }
                
}