package ejerciciosClase;
import utiles.TecladoIn;

/**
 *
 * @author alumno
 */
public class estacionamiento {
    
    public static int calcular(int cantDias){
        // Modulo que calcula el monto a pagar de estacionamiento
        int horasEstacionamiento, diaSemana, montoParcial, i;                                                      
        int tarifaDS = 30;                                                      // La tarifa es de $ 30 por hora de lunes a viernes 
        int tarifaFDS= 50;                                                      // La tarifa es de $ 50 los fines de semana
        int montoTotal = 0;                                                          
        for (i = 0; i < cantDias; i++){
            System.out.println("Dia de semana o fin de semana?");
            System.out.print("1 = Dia de semana ; 2 = Fin de semana: ");
            diaSemana = TecladoIn.readInt();
            if (diaSemana == 1){
                System.out.print("Horas estacionado? ");
                horasEstacionamiento = TecladoIn.readInt();
                montoParcial = horasEstacionamiento * tarifaDS;
                montoTotal = montoTotal + montoParcial;
            } else {
                if (diaSemana == 2){
                    System.out.print("Horas estacionado? ");
                    horasEstacionamiento = TecladoIn.readInt();
                    montoParcial = horasEstacionamiento * tarifaFDS;
                    montoTotal = montoTotal + montoParcial;  
                } else {
                    System.out.println("ERROR");
                }
            }
        }
        return montoTotal;
    }
    
    public static void main(String[] args) {
        // Algoritmo de estacionamiento de un vehiculo
        // Declaracion y asignacion de variables
        String patenteAuto;
        int cantidadDias, total;                     
        // Ingreso y lectura de datos
        System.out.print("Ingrese la pantente del auto: ");
        patenteAuto = TecladoIn.readLine();
        System.out.print("Ingrese cantidad de dias estacionado: ");
        cantidadDias = TecladoIn.readInt();
        // Import del modulo
        total = calcular(cantidadDias);
        // Devolucion de datos
        System.out.println("El monto a pagar de estacionamiento para la patente " + patenteAuto.toUpperCase() + " es: " + total);
        
    }
    
}