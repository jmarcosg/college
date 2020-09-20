package tp4;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej5 {

    public static void main(String[] args) {
        // Programa que calcula el consumo combustible de un auto.
        // Declaracion y asignacion de variables.
        double litrosCombustible, distancia;
        // Por regla de tres simple se puede sacar la cantidad de litros que consume el auto por cada kilometro.
        litrosCombustible = 0.08;
        // Ingreso de datos de usuario
        System.out.print("Ingrese la distancia a ser recorrida en km: ");
        // Lectura de datos
        distancia = TecladoIn.readLineDouble();
        // Calculo
        litrosCombustible = litrosCombustible * distancia;
        // Devolucion de datos
        System.out.println("Cantidad de combustible necesario para "+distancia +" km: "+litrosCombustible +" litros");
    }
    
}
