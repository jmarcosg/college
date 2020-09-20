package coloquio;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class temperaturas {

    /**
     *
     * @param t1
     * @param tipoTemp
     * @return
     */
    
    
    public static boolean verificarTemperatura(String t1, char tipoTemp){
        // Modulo que realiza la verificacion de una temperatura
        // Declaracion e inicializacion de variables
        boolean esValida = false;
        int temp1 = Integer.parseInt(t1);

        // Verifico que la temperatura sea de dos digitos. Ademas se verifica si la unidad utilizada es la correcta.
        if (temp1 >= -99 && temp1 <= 99){
            if (tipoTemp == 'c' | tipoTemp == 'f'){
                esValida = true;
            }
        }

        return esValida;
    }
    
    public static void verificarPorque(String t1, char tipoTemp){
        // Modulo que verifica porque un temperatura no es valida
        // Declaracion e inicializacion de variables
        int temp1 = Integer.parseInt(t1);
        
        if (temp1 <= -99 && temp1 >= 99){
            System.out.println("ERROR. Su temperatura tiene que ser de dos digitos");
        }
        
        if (tipoTemp != 'c' & tipoTemp != 'f'){
            System.out.println("ERROR. Su temperatura no esta en grados Celcius o grados Fahrenheit");
        }
    }
    
    public static void esMenor (String t1, String t2, char tipoTemp){
        // Modulo que compara cual es la menor de las temperaturas ingresadas
        
        //Declaracion e inicilizacion de variables
        int temp1 = Integer.parseInt(t1);
        int temp2 = Integer.parseInt(t2);
        
        if (temp1 > temp2){
            System.out.println("La primer temperatura: "+ t1 + tipoTemp + " es menor que la segunda temperatura: "+ t2 + '°' + tipoTemp);
        } else {
            System.out.println("La segunda temperatura: "+ t2 + tipoTemp + " es mayor que la primer temperatura: "+ t1 + '°' + tipoTemp);
        }
    }
    
    public static void secuenciaTemperaturas(int cantTemps){
        // Modulo que muestra la menor de las temperaturas de una secuencia.
        // Declaracion e inicializacion de variables
        int temp1, temp2, menorTemp, totalTemps = 1;
        char tipoTemp;
        
        System.out.print("Ingrese el tipo de temperatura a utilizar: ");
        tipoTemp = TecladoIn.readChar();
        System.out.print("Ingrese una temperatura: ");
        temp1 = TecladoIn.readInt();
        menorTemp = temp1;
        
        do{
            System.out.print("Ingrese una temperatura: ");
            temp2 = TecladoIn.readInt();
            if (temp2 < menorTemp){
                menorTemp = temp2;
            }
            totalTemps++;
        } while (totalTemps != cantTemps);
        
        System.out.println("La menor temperatura ingresada fue: " + menorTemp + '°' + tipoTemp);
    }
    
   

    public static void menu() {
        // Modulo que muestra el menu de opciones para el usuario
        System.out.println("_________________________________________________");
        System.out.println("Ingrese el numero correspondiente a la opcion deseada.");
        System.out.println("");
        System.out.println("1: Verificar temperatura valida.");
        System.out.println("2: Determinar porque una temeperatura no es valida.");
        System.out.println("3: Verificar si una temperatura es mas fria que otra.");
        System.out.println("4: Ingresar una secuencia de temperaturas y obtener la temperatura mas fria.");
        System.out.println("5: Ingresar una secuencia de temperaturas y una temperatura determinada A, y hallar cantidad de ocurrencias de A.");
        System.out.println("6: Incrementar un grado la temperatura.");
        System.out.println("7: Dada una secuencia de temperaturas, obtener la temperatura mas fria.");
        System.out.println("8: Dada una secuencia de temperaturas y una temperatura determinada A, hallar cantidad de ocurrencias de A.");
        System.out.println("0: Terminar programa");
        System.out.println("_________________________________________________");
        System.out.print("Ingrese una opcion a realizar: ");
    }
    
    

    public static void main(String[] args) {
        // Algoritmo donde el usuario elige la opcion a realizar
        // Declaracion e inicializacion de variables
        int opcion, cantidadTemperaturas;
        String cadenaTemp1, cadenaTemp2;
        char tipoTemperatura;

        // Menu de opciones
        do {
            menu();
            opcion = TecladoIn.readInt();
            switch (opcion){
                case 1:
                    System.out.println("Usted eligio la opcion 1.");
                    System.out.println("Verificar temperatura.");
                    System.out.print("Ingrese una temperatura: ");
                    cadenaTemp1 = TecladoIn.readLine();
                    System.out.print("Ingrese su tipo de temperatura °C(Celcius) / °F(Fahrenheit): ");
                    tipoTemperatura = TecladoIn.readChar();
                    System.out.println(verificarTemperatura(cadenaTemp1, tipoTemperatura));
                    break;
                case 2:
                    System.out.println("Usted eligio la opcion 2.");
                    System.out.print("Ingrese su temperatura: ");
                    cadenaTemp1 = TecladoIn.readLine();
                    System.out.print("Ingrese el tipo de temperatura: ");
                    tipoTemperatura = TecladoIn.readChar();
                    verificarPorque(cadenaTemp1, tipoTemperatura);
                    break;
                case 3:
                    System.out.println("Usted eligio la opcion 3.");
                    System.out.print("Ingrese la primer temperatura: ");
                    cadenaTemp1 = TecladoIn.readLine();
                    System.out.print("Ingrese la segunda temperatura: ");
                    cadenaTemp2 = TecladoIn.readLine();
                    System.out.print("Ingrese el tipo de temperatura a utilizar: ");
                    tipoTemperatura = TecladoIn.readChar();
                    esMenor(cadenaTemp1, cadenaTemp2, tipoTemperatura);                   
                    break;
                case 4:
                    System.out.println("Usted eligio la opcion 4");
                    System.out.print("Cuantas temperaturas desea ingresar?: ");
                    cantidadTemperaturas = TecladoIn.readInt();
                    secuenciaTemperaturas(cantidadTemperaturas);
                    break;
                case 5: 
                    break;
                case 6:
                    break;
                case 7:
                    break;
                case 0:
                    System.out.println("Programa finalizado.");
                default:
                    break;

            }
        } while (opcion != 0);

    }

}
