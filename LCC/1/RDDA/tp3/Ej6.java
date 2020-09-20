package tp3;
import utiles.TecladoIn;

public class Ej6 {
	
	/**
     * Se desea encriptar un mensaje, ingresado en una cadena de caracteres que sólo puede contener letras. 
     * El método consiste en cambiar las vocales por los siguientes símbolos: *, /, +, - y #
     * @param ch
     * @return el nuevo caracter modificado con los simbolos
     */
	
	
	public static int cambiarAscii (String [] arreglo) {
		//
		int a = 0;
		return a;
	}
	
	
    public static char encriptar(String [] arreglo) {
        //Declaracion e inicializacion de variables
        char nuevoCh = 0;
        int i;
        int longitud = arreglo.length;
        
        
        for (i = 0; i < longitud; i++) {
        	switch (arreglo[i]) {
            case 'A':
                nuevoCh = '*';
                break;
            case 'a':
            	nuevoCh = '*';
            	break;
            case 'E':
                nuevoCh = '/';
                break;
            case 'e':
            	nuevoCh = '/';
            	break;
            case 'I':
                nuevoCh = '+';
                break;
            case 'i':
            	nuevoCh = '+';
            	break;
            case 'O':
                nuevoCh = '-';
                break;
            case 'o':
            	nuevoCh = '-';
            	break;
            case 'U':
                nuevoCh = '#';
                break;
            case 'u':
            	nuevoCh = '#';
            	break;
        	}
        }
        
        return nuevoCh;
    }
    

    // (a) Promedio general.
    public static int promedioGeneral(String [] arreglo) {
        //Declaracion e inicializacion de variables
        int i, cantElem = 0, promedio;
        int longitud = arreglo.length;

		for (i = 0; i < longitud; i++) {
            if (Character.isLetter(ch)) {    //Me interesan los numeros
                cantElem++;   //Sumo los elementos
            }
        }
        promedio = cantElem / longitud;
        return promedio;
    }

    // (b) el caracter que representa el primer código ASCII par.
    public static char primerCodPar(String [] arreglo) {
        int numAscii, i = 0;
        boolean codPar = false;
        char ch = 0;
        int longitud = arreglo.length;

        while (!codPar && i < longitud) {
            numAscii = arreglo[i];
            if (esPar(numAscii)) {   //Si el cod ascii del caracter del arreglo en la posicion i es par retorna true
                codPar = true;
                ch = arreglo[i];
            }
            i++;
        }
        return ch;
    }

    // (c) una cadena de caracteres formada por todos los ASCII pares.
    public static String pares(String [] arreglo) {
        int numAscii, i = 0;
        boolean codPar = false;
        String cadena = null;

        while (!codPar && i < longitud) {
            numAscii = arreglo[i];
            if (esPar(numAscii)) {   //Si el cod ascii del caracter del arreglo en la posicion i es par retorna true
                codPar = true;
                cadena = cadena + arreglo[i];
            }
            i++;
        }
        return cadena;
    }

    // (d) una cadena de caracteres formada por todos los ASCII impares.
    public static String impares(String [] arreglo) {
        int numAscii, i = 0;
        boolean codPar = false;
        String cadena = null;

        while (!codPar && i < longitud) {
            numAscii = arreglo[i];
            if (!esPar(numAscii)) {   //Si el cod ascii del caracter del arreglo en la posicion i  no es par retorna true
                codPar = true;
                cadena = cadena + arreglo[i];
            }
            i++;
        }
        return cadena;
    }

    // (e) qué porcentaje de letras respecto del total de letras ingresadas, tienen código ASCII par.
    public static double porcentajePar(String [] arreglo) {
        int i, cantPares = 0, cantNumeros = 0;
        double porcentPares;

        for (i = 0; i < longitud; i++) {
            if (Character.isLetter(arreglo[i])) {
                cantPares = cantPares + 0;
            } else {
                if ((arreglo[i] % 2) == 0) {
                    cantPares++;
                    cantNumeros++;
                } else {
                    cantNumeros++;
                }
            }
        }

        porcentPares = (cantPares * 100) / cantNumeros;

        return porcentPares;
    }

    // (f) qué porcentaje de letras respecto del total de letras ingresadas, tienen código ASCII impar.
    public static double porcentajeImpar(String [] arreglo) {
        int i, cantImpares = 0, cantNumeros = 0;
        double porcentImpares;

        for (i = 0; i < longitud; i++) {
            if (Character.isLetter(arreglo[i])) {
                cantImpares = cantImpares + 0;
            } else {
                if ((arreglo[i] % 2) == 1) {
                    cantImpares++;
                    cantNumeros++;
                } else {
                    cantNumeros++;
                }
            }
        }

        porcentImpares = (cantImpares * 100) / cantNumeros;

        return porcentImpares;
    }

    public static void main(String[] args) {
        //Declaracion de variables
        String[] arregloPalabras = {"Hola"};
        
        
        //Invoco los modulos
        System.out.println("Cartel encriptado "+encriptar(arregloPalabras));
        System.out.println("El promedio general es: "+promedioGeneral(arregloPalabras));
        System.out.println("El primer caracter que representa el cod ASCII par es: "+primerCodPar(arregloPalabras));
        System.out.println("Cdena formada por todos los ASCII pares: "+pares(arregloPalabras));
        System.out.println("Cadena formada por todos los ASCII impares: "+impares(arregloPalabras));
        System.out.println("Porcentaje de los ASCII pares: "+porcentajePar(arregloPalabras));
        System.out.println("Porcentaje de los ASCII impares: "+porcentajeImpar(arregloPalabras));

    }

    public static boolean esPar(int numAscii) {
        //Este modulo verifica si un numero es par o impar
        boolean par;
        par = numAscii % 2 == 0;
        return par;
    }
    
}
