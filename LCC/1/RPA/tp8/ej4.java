package tp8;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej4 {

    public static double costoEncomienda(double kg){
        // Modulo que calcula el costo del envio
        // double kg es el peso del envio
        // Declaracion y asignacion de variables
        int costoEnvio, seguroEnvio;
        double total = 0;
        costoEnvio = 50;
        seguroEnvio = 30;
        // Calculos
        if (kg == 0){
            total = total + 0;                                     // Si el peso del envio es igual a 0 no suma nada
        } else {
            total = (costoEnvio * kg) + seguroEnvio;               // Si el peso del envio es mayor a 0 suma costo + seguro
        }
        return total;
    }
    
    
    public static void main(String[] args) {
        // Algoritmo de transporte de encomiendas
        // Declaracion y asignacion de variables
        int cantidadEnvios = 0;
        double kgEnvio, salida, monto = 0;
        do{
            System.out.print("Ingrese peso del envio: ");      // Ingreso y lectura de datos         
            kgEnvio = TecladoIn.readDouble();
            cantidadEnvios++;                                  // Contador de cantidad de envios
            salida = costoEncomienda(kgEnvio);                 // Se llama al modulo para calcular el costo
            monto = monto + salida;
            if (kgEnvio == 0){
                System.out.println("Monto total a pagar para " + (cantidadEnvios - 1) + " envio(s) : " + monto);                  // cantidadEnvios - 1 porque sino sigue sumando la cantidad de envios 
            } else {
                System.out.println("Monto parcial a pagar para " + cantidadEnvios + " envios : " + monto);
            }
        } while (kgEnvio != 0);             
    }
}




        