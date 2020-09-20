package tp7;
import utiles.TecladoIn;

/**
 *
 * @author kcy0
 */
public class ej5 {

    
    public static double supTanque(double rad, double alt){
        // Modulo que calcula la superficie del tanque
        // double rad, alt (radio, altura respectivamente)
        double superficie;
        double pi = 3.14;
        superficie = (2 * pi * (rad * rad)) + (2 * pi * rad * alt );
        return superficie;                                                      // Devuelve el valor de la superfice
    }
    
    public static double pintarTanque(double sup,double rendPintura){
        // Modulo que calcula la cantidad de pintura a ser utilizada
        // double sup, rendPintura (superficie del tanque y rendimiento pintura)
        double cantPintura;
        cantPintura = sup * rendPintura;
        return cantPintura;
    }
    
    
    
    public static void main(String[] args) {
        // Algorimo que calcula la cantidad de pintura necesaria para pintar un tanque
        // Declaracion y asignacion de variables
        double radioTanque, alturaTanque, rendimientoPintura, superficieTanque, cantidadPintura;
        // Ingreso y lectura de datos
        System.out.print("Ingrese la altura del tanque: ");
        alturaTanque = TecladoIn.readDouble();
        System.out.print("Ingrese el radio del tanque: ");
        radioTanque = TecladoIn.readDouble();
        System.out.print("Ingrese el rendimiento de la pintura: ");
        rendimientoPintura = TecladoIn.readDouble();
        // Llamada al modulo para calcular la supeficie del tanque
        superficieTanque = supTanque(radioTanque, alturaTanque);
        // Llamada al modulo para calcular la cantidad de pintura
        cantidadPintura = pintarTanque(superficieTanque, rendimientoPintura);
        // Devolucion de datos
        System.out.println("Se van a necesitar: " + cantidadPintura + " lts de pintura.");
        
    }
    
}
